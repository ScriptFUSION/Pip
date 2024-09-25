<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip\Theme;

use PHPUnit\Util\Color;
use ScriptFUSION\Pip\TestPerformance;
use ScriptFUSION\Pip\TestResult;
use ScriptFUSION\Pip\TestStatus;

final class ClassicTheme implements Theme
{
    public function onTestFinished(TestResult $result): void
    {
        printf(
            "%3d%% %s %s %s%s",
            $result->calculateProgressPercentage(),
            ($statusColour = self::getStatusColour($result->status)) === ''
                ? self::getStatusCode($result->status)
                : Color::colorize("fg-$statusColour", self::getStatusCode($result->status)),
            Color::colorize("fg-" . self::getColour($result->status), $result->id),
            Color::colorize(
                'fg-' . self::getPeformanceColour($result->testPerformance),
                "($result->testDurationMs ms)"
            ),
            PHP_EOL,
        );

        if ($result->status === TestStatus::Failed) {
            echo PHP_EOL, Color::colorize('fg-red', $result->throwable->description()), PHP_EOL,
                Color::colorize('fg-red', $result->throwable->stackTrace()), PHP_EOL
            ;
        }

        while ($result->status === TestStatus::Errored && $throwable ??= $result->throwable) {
            echo PHP_EOL, Color::colorize('fg-white,bg-red', " {$throwable->className()} "), ' ',
                Color::colorize('fg-red', $throwable->message()), PHP_EOL, PHP_EOL,
                Color::colorize('fg-red', $throwable->stackTrace()), PHP_EOL
            ;

            if (!$throwable->hasPrevious()) {
                break;
            }

            echo Color::colorize('fg-red', 'Caused by');
            $throwable = $throwable->previous();
        }

        if ($result->trace && !$result->trace->suppressed) {
            printf(
                Color::colorize("fg-$statusColour", '%s%s: %s in %s on line %s%1$s%1$s'),
                PHP_EOL,
                $result->status->name,
                $result->trace->message,
                $result->trace->file,
                $result->trace->line,
            );
        }
    }

    private static function getStatusCode(TestStatus $status): string
    {
        return match ($status) {
            TestStatus::Passed => '.',
            TestStatus::Flawed => '!',
            default => $status->name[0],
        };
    }

    private static function getStatusColour(TestStatus $status): string
    {
        return match ($status) {
            TestStatus::Passed => '',
            TestStatus::Flawed => 'red',
            default => self::getColour($status),
        };
    }

    private static function getColour(TestStatus $status): string
    {
        return match ($status) {
            TestStatus::Passed,
            TestStatus::Flawed => 'green,bold',
            TestStatus::Failed,
            TestStatus::Errored => 'red,bold',
            TestStatus::Skipped => 'cyan,bold',
            TestStatus::Incomplete,
            TestStatus::Risky,
            TestStatus::Notice,
            TestStatus::Warning,
            TestStatus::Deprecated, => 'yellow,bold',
        };
    }

    private static function getPeformanceColour(TestPerformance $performance): string
    {
        return match ($performance) {
            TestPerformance::OK => 'green',
            TestPerformance::Slow => 'yellow',
            TestPerformance::VerySlow => 'red',
        };
    }
}
