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
}
