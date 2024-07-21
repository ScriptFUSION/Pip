<?php
declare(strict_types=1);

namespace ScriptFUSIONTest\Pip\config;

use PHPUnit\Framework\TestCase;

final class PerformanceThresholdsTest extends TestCase
{
    public function testSlow(): void
    {
        usleep(300_000);

        self::assertTrue(true);
    }

    public function testVslow(): void
    {
        usleep(600_000);

        self::assertTrue(true);
    }
}
