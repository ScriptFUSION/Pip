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

final class Printer implements Tracer
{
    private int $totalTests;

    private int $testCounter = 0;

    private ?TestStatus $status = null;

    private HRTime $start;

    private ?Throwable $throwable = null;

    private ?Trace $trace = null;

    private bool $flawless = true;

    public function __construct(private readonly PipConfig $config)
    {
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
            $this->status ??= TestStatus::Failed;

            $this->throwable = $event->throwable();
            $this->flawless = false;
        }
        if ($event instanceof Errored) {
            $this->status ??= TestStatus::Errored;

            $this->throwable = $event->throwable();
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

            $this->trace = new Trace($event->message(), $event->test()->file(), $event->test()->line());
        }
        if ($event instanceof PhpNoticeTriggered) {
            if (!$event->wasSuppressed()) {
                $this->status ??= TestStatus::Notice;
            }

            $this->trace = Trace::fromEvent($event);
        }
        if ($event instanceof PhpWarningTriggered) {
            if (!$event->wasSuppressed()) {
                $this->status ??= TestStatus::Warning;
            }

            $this->trace = Trace::fromEvent($event);
        }
        if ($event instanceof PhpDeprecationTriggered) {
            if (!$event->wasSuppressed()) {
                $this->status ??= TestStatus::Deprecated;
            }

            $this->trace = Trace::fromEvent($event);
        }

        if ($event instanceof Finished) {
            $id = $event->test()->id();
            if ($this->config->testNameStrip !== '') {
                $id = str_replace($this->config->testNameStrip, '', $id);
            }

            // Data provider case.
            if ($event->test()->isTestMethod() && $event->test()->testData()->hasDataFromDataProvider()) {
                $id = substr($id, 0, strrpos($id, '#'));

                $data = $event->test()->testData()->dataFromDataProvider()->dataAsStringForResultOutput();
                if (!$this->config->testDpArgs) {
                    $dsn = $event->test()->testData()->dataFromDataProvider()->dataSetName();
                    $data = substr($data, 0, (is_int($dsn) ? 16 : 17) + strlen((string)$dsn));
                }

                $id .= $data;
            }

            $ms = round($event->telemetryInfo()->time()->duration($this->start)->asFloat() * 1_000)|0;
            $performance = match (true) {
                $ms >= $this->config->perfVslow => TestPerformance::VerySlow,
                $ms >= $this->config->perfSlow => TestPerformance::Slow,
                default => TestPerformance::OK,
            };

            $this->config->theme->onTestFinished(new TestResult(
                $id,
                $this->status,
                $this->totalTests,
                ++$this->testCounter,
                $ms,
                $performance,
                $this->throwable,
                $this->trace,
            ));

            $this->trace = $this->throwable = $this->status = null;
        }

        if ($event instanceof \PHPUnit\Event\TestRunner\Finished) {
            echo PHP_EOL, PHP_EOL;
        }
    }
}
