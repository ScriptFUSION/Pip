<?php
declare(strict_types=1);

namespace ScriptFUSION\Pip;

enum TestPerformance
{
    case OK;
    case Slow;
    case VerySlow;
}
