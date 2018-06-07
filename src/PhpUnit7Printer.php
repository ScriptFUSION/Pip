<?php
namespace ScriptFUSION\PHPUnitImmediateExceptionPrinter;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\TextUI\ResultPrinter;

class PhpUnit7Printer extends ResultPrinter
{
    use Printer {
      writeProgress as writeProgressFallback;
    }

    public function startTest(Test $test) : void
    {
        parent::startTest($test);

        $this->onStartTest();
    }

    protected function writeProgress(string $progress): void
    {
      $this->writeProgressFallback($progress);
    }

    protected function writeProgressWithColor(string $color, string $buffer): void
    {
        parent::writeProgressWithColor($color, $buffer);

        $this->onWriteProgressWithColor($color);
    }

    public function endTest(Test $test, float $time): void
    {
        parent::endTest($test, $time);

        $this->onEndTest($test, $time);
    }

    public function addError(Test $test, \Throwable $t, float $time): void
    {
        $this->onAddError(new \Exception($t->getMessage(), $t->getCode(), $t));
    }

    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->onAddFailure($e);
    }
}
