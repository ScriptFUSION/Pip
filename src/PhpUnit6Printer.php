<?php
namespace ScriptFUSION\PHPUnitImmediateExceptionPrinter;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\TextUI\ResultPrinter;

class PhpUnit6Printer extends ResultPrinter
{
    use Printer;

    public function startTest(Test $test)
    {
        parent::startTest($test);

        $this->onStartTest();
    }

    protected function writeProgressWithColor($color, $buffer)
    {
        parent::writeProgressWithColor($color, $buffer);

        $this->onWriteProgressWithColor($color);
    }

    public function endTest(Test $test, $time)
    {
        parent::endTest($test, $time);

        $this->onEndTest($test, $time);
    }

    public function addError(Test $test, \Exception $e, $time)
    {
        $this->onAddError($e);
    }

    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        $this->onAddFailure($e);
    }
}
