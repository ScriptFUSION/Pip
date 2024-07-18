<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

enum TestStatus
{
    case Passed;
    case Flawed;
    case Failed;
    case Errored;
    case Skipped;
    case Incomplete;
    case Risky;
    case Notice;
    case Warning;
    case Deprecated;

    public function getStatusCode(): string
    {
        return match ($this) {
            self::Passed => '.',
            self::Flawed => '!',
            self::Failed => 'F',
            self::Errored => 'E',
            self::Skipped => 'S',
            self::Incomplete => 'I',
            self::Risky => 'R',
            self::Notice => 'N',
            self::Warning => 'W',
            self::Deprecated => 'D',
        };
    }

    public function getStatusColour(): string
    {
        return match ($this) {
            self::Passed => '',
            self::Flawed => 'red',
            default => $this->getColour(),
        };
    }

    public function getColour(): string
    {
        return match ($this) {
            self::Passed => 'green,bold',
            self::Flawed => 'green,bold',
            self::Failed => 'red,bold',
            self::Errored => 'red,bold',
            self::Skipped => 'cyan,bold',
            self::Incomplete,
            self::Risky,
            self::Notice,
            self::Warning,
            self::Deprecated, => 'yellow,bold',
        };
    }
}
