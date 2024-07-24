<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

final class PipConfig
{
    public int $perfSlow = 200;
    public int $perfVslow = 1_000;
    public string $testNameStrip = '';
}
