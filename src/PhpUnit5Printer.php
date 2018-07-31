<?php
namespace LifeWorksForks\PHPUnitImmediateExceptionPrinter;

class PhpUnit5Printer extends \PHPUnit_TextUI_ResultPrinter
{
    use Printer;

    public function startTest(\PHPUnit_Framework_Test $test)
    {
        parent::startTest($test);

        $this->onStartTest();
    }

    protected function writeProgressWithColor($color, $buffer)
    {
        parent::writeProgressWithColor($color, $buffer);

        $this->onWriteProgressWithColor($color);
    }

    public function endTest(\PHPUnit_Framework_Test $test, $time)
    {
        parent::endTest($test, $time);

        $this->onEndTest($test, $time);
    }

    public function addError(\PHPUnit_Framework_Test $test, \Exception $e, $time)
    {
        $this->onAddError($e);
    }

    public function addFailure(\PHPUnit_Framework_Test $test, \PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        $this->onAddFailure($e);
    }
}
