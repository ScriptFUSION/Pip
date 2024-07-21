<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

use PHPUnit\Event\Code\Throwable;
use PHPUnit\Event\Event;
use PHPUnit\Event\Telemetry\HRTime;
use PHPUnit\Event\Test\ConsideredRisky;
use PHPUnit\Event\Test\Errored;
use PHPUnit\Event\Test\Failed;
use PHPUnit\Event\Test\Finished;
use PHPUnit\Event\Test\MarkedIncomplete;
use PHPUnit\Event\Test\Passed;
use PHPUnit\Event\Test\PhpDeprecationTriggered;
use PHPUnit\Event\Test\PhpNoticeTriggered;
use PHPUnit\Event\Test\PhpWarningTriggered;
use PHPUnit\Event\Test\Prepared;
use PHPUnit\Event\Test\Skipped;
use PHPUnit\Event\TestRunner\ExecutionStarted;
use PHPUnit\Event\Tracer\Tracer;
use PHPUnit\Util\Color;

final class Printer implements Tracer
{
    private readonly array $performanceThresholds;

    private int $totalTests;

    private int $testCounter = 0;

    private ?TestStatus $status = null;

    private HRTime $start;

    private ?Throwable $throwable = null;

    private bool $flawless = true;

    public function __construct(private readonly PipConfig $config)
    {
        $this->performanceThresholds = [
            'red' => $config->perfVslow,
            'yellow' => $config->perfSlow,
            'green' => 0,
        ];
    }

    public function trace(Event $event): void
    {
        if ($event instanceof ExecutionStarted) {
            $this->totalTests = $event->testSuite()->count();
        }

        if ($event instanceof Prepared) {
            $this->start = $event->telemetryInfo()->time();
        }

        if ($event instanceof Passed) {
            $this->status ??= $this->flawless ? TestStatus::Passed : TestStatus::Flawed;
        }
        if ($event instanceof Failed) {
            $this->throwable = $event->throwable();

            $this->status ??= TestStatus::Failed;
            $this->flawless = false;
        }
        if ($event instanceof Errored) {
            $this->throwable = $event->throwable();

            $this->status ??= TestStatus::Errored;
            $this->flawless = false;
        }
        if ($event instanceof Skipped) {
            $this->status ??= TestStatus::Skipped;
        }
        if ($event instanceof MarkedIncomplete) {
            $this->status ??= TestStatus::Incomplete;
        }
        if ($event instanceof ConsideredRisky) {
            // Allow risky status to override passed (or flawed) status only.
            if ($this->status === TestStatus::Passed || $this->status === TestStatus::Flawed) {
                $this->status = TestStatus::Risky;
            }
        }
        if ($event instanceof PhpNoticeTriggered) {
            $this->status ??= TestStatus::Notice;
        }
        if ($event instanceof PhpWarningTriggered) {
            $this->status ??= TestStatus::Warning;
        }
        if ($event instanceof PhpDeprecationTriggered) {
            $this->status ??= TestStatus::Deprecated;
        }

        if ($event instanceof Finished) {
            $id = $event->test()->id();

            // Data provider case.
            if ($event->test()->isTestMethod() && $event->test()->testData()->hasDataFromDataProvider()) {
                $id = substr($id, 0, strrpos($id, '#'));
                $id .= $event->test()->testData()->dataFromDataProvider()->dataAsStringForResultOutput();
            }

            $ms = round($event->telemetryInfo()->time()->duration($this->start)->asFloat() * 1_000);
            foreach ($this->performanceThresholds as $colour => $threshold) {
                if ($ms >= $threshold) {
                    break;
                }
            }

            printf(
                "%3d%% %s %s %s%s",
                floor(++$this->testCounter / $this->totalTests * 100),
                $this->status->getStatusColour() === ''
                    ? $this->status->getStatusCode()
                    : Color::colorize("fg-{$this->status->getStatusColour()}", $this->status->getStatusCode()),
                Color::colorize("fg-{$this->status->getColour()}", $id),
                Color::colorize("fg-$colour", "($ms ms)"),
                PHP_EOL,
            );

            if ($this->status === TestStatus::Failed) {
                echo PHP_EOL, Color::colorize('fg-red', $this->throwable->description()), PHP_EOL,
                    Color::colorize('fg-red', $this->throwable->stackTrace()), PHP_EOL
                ;

                $this->throwable = null;
            }

            while ($this->status === TestStatus::Errored && $this->throwable) {
                echo PHP_EOL, Color::colorize('fg-white,bg-red', " {$this->throwable->className()} "), ' ',
                    Color::colorize('fg-red', $this->throwable->message()), PHP_EOL, PHP_EOL,
                    Color::colorize('fg-red', $this->throwable->stackTrace()), PHP_EOL
                ;

                if ($this->throwable->hasPrevious()) {
                    echo Color::colorize('fg-red', 'Caused by');

                    $this->throwable = $this->throwable->previous();
                } else {
                    $this->throwable = null;
                }
            }

            $this->status = null;
        }

        if ($event instanceof \PHPUnit\Event\TestRunner\Finished) {
            echo PHP_EOL, PHP_EOL;
        }
    }
}
