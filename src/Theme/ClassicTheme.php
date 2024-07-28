<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip\Theme;

use PHPUnit\Util\Color;
use ScriptFUSION\Pip\TestResult;
use ScriptFUSION\Pip\TestStatus;

final class ClassicTheme implements Theme
{
    public function onTestFinished(TestResult $result): void
    {
        printf(
            "%3d%% %s %s %s%s",
            $result->calculateProgressPercentage(),
            $result->status->getStatusColour() === ''
                ? $result->status->getStatusCode()
                : Color::colorize("fg-{$result->status->getStatusColour()}", $result->status->getStatusCode()),
            Color::colorize("fg-{$result->status->getColour()}", $result->id),
            Color::colorize("fg-$result->testDurationColour", "($result->testDurationMs ms)"),
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

        if ($result->trace) {
            printf(
                Color::colorize("fg-{$result->status->getColour()}", '%s%s: %s in %s on line %s%1$s%1$s'),
                PHP_EOL,
                $result->status->name,
                $result->trace->message,
                $result->trace->file,
                $result->trace->line,
            );
        }
    }
}
