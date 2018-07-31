<?php
declare(strict_types=1);

namespace LifeWorksForks\PHPUnitImmediateExceptionPrinter;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\TextUI\ResultPrinter;

class PhpUnit7Printer extends ResultPrinter
{
    use Printer {
        Printer::writeProgress as writeProgressImplementation;
    }

    public function startTest(Test $test): void
    {
        parent::startTest($test);

        $this->onStartTest();
    }

    protected function writeProgress(string $progress): void
    {
        $this->writeProgressImplementation($progress);
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
        $this->onAddError($t);
    }

    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->onAddFailure($e);
    }
}
