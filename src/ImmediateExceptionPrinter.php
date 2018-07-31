<?php
namespace LifeWorksForks\PHPUnitImmediateExceptionPrinter;

if (class_exists(\PHPUnit_TextUI_ResultPrinter::class)) {
    class ImmediateExceptionPrinter extends PhpUnit5Printer
    {
    }
} else {
    class ImmediateExceptionPrinter extends PhpUnit6Printer
    {
    }
}
