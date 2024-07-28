<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

use ScriptFUSION\Pip\Theme\ClassicTheme;
use ScriptFUSION\Pip\Theme\Theme;

final class PipConfig
{
    public int $perfSlow = 200;
    public int $perfVslow = 1_000;
    public bool $testDpArgs = true;
    public string $testNameStrip = '';

    public function __construct(public readonly Theme $theme = new ClassicTheme())
    {
    }
}
