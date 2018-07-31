<?php
namespace LifeWorksForks\PHPUnitImmediateExceptionPrinter;

use PHPUnit\Runner\Version;

if (class_exists(\PHPUnit_TextUI_ResultPrinter::class)) {
    class ImmediateExceptionPrinter extends PhpUnit5Printer
    {
    }
} elseif (\class_exists(Version::class) && \version_compare(Version::id(), '7.0', '<=')) {
    class ImmediateExceptionPrinter extends PhpUnit6Printer
    {
    }
} else {
    class ImmediateExceptionPrinter extends PhpUnit7Printer
    {
    }
}
