<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

use PHPUnit\Event\Test\PhpDeprecationTriggered;
use PHPUnit\Event\Test\PhpNoticeTriggered;
use PHPUnit\Event\Test\PhpWarningTriggered;

final class Trace
{
    public function __construct(
        public readonly TestStatus $issueStatus,
        public readonly string $message,
        public readonly string $file,
        public readonly int $line,
        public readonly bool $suppressed = false,
    ) {}

    public static function fromEvent(PhpWarningTriggered|PhpNoticeTriggered|PhpDeprecationTriggered $event): self
    {
        return new self(
            match (true) {
                $event instanceof PhpWarningTriggered => TestStatus::Warning,
                $event instanceof PhpNoticeTriggered => TestStatus::Notice,
                $event instanceof PhpDeprecationTriggered => TestStatus::Deprecated,
            },
            $event->message(),
            $event->file(),
            $event->line(),
            $event->wasSuppressed(),
        );
    }

    /**
     * Gets a unique identifier for the source of this trace, using the same rules as PHPUnit.
     *
     * @see \PHPUnit\TestRunner\TestResult\Collector::issueId
     */
    public function getId(): string
    {
        return "$this->file:$this->line:$this->message";
    }
}
