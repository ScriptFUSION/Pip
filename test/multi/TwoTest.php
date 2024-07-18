<?php
declare(strict_types=1);

namespace ScriptFUSIONTest\Pip\multi;

use PHPUnit\Framework\TestCase;

final class TwoTest extends TestCase
{
    public function testFailure(): void
    {
        self::assertTrue(false);
    }
}
