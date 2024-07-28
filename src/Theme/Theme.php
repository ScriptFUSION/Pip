<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip\Theme;

use ScriptFUSION\Pip\TestResult;

interface Theme
{
    public function onTestFinished(TestResult $result): void;
}
