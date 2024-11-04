<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

use PHPUnit\Event\Code\Throwable;

final class TestResult
{
    public function __construct(
        public readonly string $id,
        public readonly TestStatus $status,
        public readonly int $totalTests,
        public readonly int $testCounter,
        public readonly int $testDurationMs,
        public readonly TestPerformance $testPerformance,
        public readonly ?Throwable $throwable,
        /** @var array<string, Trace> */
        public readonly array $uniqueTraces,
    ) {
    }

    public function calculateProgressPercentage(): int
    {
        return floor($this->testCounter / $this->totalTests * 100)|0;
    }
}
