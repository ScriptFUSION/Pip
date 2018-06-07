<?php
namespace ScriptFUSION\PHPUnitImmediateExceptionPrinter;

if (class_exists(\PHPUnit_TextUI_ResultPrinter::class)) {
    class ImmediateExceptionPrinter extends PhpUnit5Printer
    {
    }
} elseif (class_exists(\PHPUnit\Runner\Version::class) && strpos(\PHPUnit\Runner\Version::id(), '7.') === 0) {
    class ImmediateExceptionPrinter extends PhpUnit7Printer
    {
    }
} else {
    class ImmediateExceptionPrinter extends PhpUnit6Printer
    {
    }
}
