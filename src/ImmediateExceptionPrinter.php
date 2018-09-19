<?php
namespace ScriptFUSION\PHPUnitImmediateExceptionPrinter;

use PHPUnit_TextUI_ResultPrinter;
use PHPUnit\Runner\Version;
use function class_exists;
use function version_compare;

if (class_exists(PHPUnit_TextUI_ResultPrinter::class)) {
    class ImmediateExceptionPrinter extends PhpUnit5Printer
    {
    }
} elseif (class_exists(Version::class) && version_compare(Version::id(), '7.0', '<=')) {
    class ImmediateExceptionPrinter extends PhpUnit6Printer
    {
    }
} else {
    class ImmediateExceptionPrinter extends PhpUnit7Printer
    {
    }
}
