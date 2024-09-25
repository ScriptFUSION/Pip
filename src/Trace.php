<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

use PHPUnit\Event\Test\PhpDeprecationTriggered;
use PHPUnit\Event\Test\PhpNoticeTriggered;
use PHPUnit\Event\Test\PhpWarningTriggered;

final class Trace
{
    public function __construct(
        public readonly string $message,
        public readonly string $file,
        public readonly int $line,
        public readonly bool $suppressed = false,
    ) {}

    public static function fromEvent(PhpWarningTriggered|PhpNoticeTriggered|PhpDeprecationTriggered $event): self
    {
        return new self($event->message(), $event->file(), $event->line(), $event->wasSuppressed());
    }
}
