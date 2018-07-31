<?php
namespace LifeWorksForks\PHPUnitImmediateExceptionPrinter;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\Test;

trait Printer
{
    /**
     * The throwable thrown by the last test.
     *
     * @var ExceptionWrapper|null
     */
    protected $throwable;

    /**
     * The assertion failure thrown by the last test.
     *
     * @var AssertionFailedError|null
     */
    protected $failure;

    /**
     * PHPUnit built-in progress indication character, e.g. E for error.
     *
     * @var string
     */
    protected $progress;

    /**
     * Last colour used by a progress indicator.
     *
     * @var string
     */
    protected $lastColour;

    /**
     * Indicates whether any errors or exceptions have occurred during the entire test run.
     *
     * @var bool
     */
    protected $flawless = true;

    private static $performanceThresholds = [
        'fg-red' => 1000,
        'fg-yellow' => 200,
        'fg-green' => 0,
    ];

    /**
     * Invoked when a test starts.
     */
    protected function onStartTest()
    {
        $this->exception = $this->failure = $this->progress = null;
        $this->lastColour = 'fg-green,bold';
    }

    /**
     * Writes progress to the output buffer.
     *
     * @param string $progress
     */
    protected function writeProgress($progress)
    {
        // Record progress so it can be written later instead of at start of line.
        $this->progress = !$this->flawless && $progress === '.'
            // If a previous error or exception occurred, replace '.' with red '!'.
            ? $this->formatWithColor('fg-red', '!')
            : $progress
        ;

        ++$this->numTestsRun;
    }

    /**
     * Invoked when coloured progress text is written.
     *
     * @param string $color PHPUnit colour name.
     */
    protected function onWriteProgressWithColor($color)
    {
        $this->lastColour = $color;
    }

    /**
     * Invoked when a test ends.
     *
     * @param Test $test
     * @param float $time Number of seconds elapsed.
     */
    protected function onEndTest($test, $time)
    {
        $this->write(sprintf(
            '%3d%% %s ',
            floor($this->numTestsRun / $this->numTests * 100),
            $this->progress
        ));
        $this->writeWithColor($this->lastColour, $this->describeTest($test), false);
        $this->writePerformance($time);

        $this->exception && $this->writeException($this->exception);
        $this->failure && $this->writeAssertionFailure($this->failure);
    }

    protected function describeTest($test)
    {
        if (class_exists(\PHPUnit_Util_Test::class)) {
            return \PHPUnit_Util_Test::describe($test);
        }

        return \PHPUnit\Util\Test::describe($test);
    }

    /**
     * Writes the test performance metric formatted as the number of milliseconds elapsed.
     *
     * @param float $time Number of seconds elapsed.
     */
    protected function writePerformance($time)
    {
        $ms = round($time * 1000);

        foreach (self::$performanceThresholds as $colour => $threshold) {
            if ($ms > $threshold) {
                break;
            }
        }

        $this->writeWithColor($colour, " ($ms ms)");
    }

    /**
     * Writes the specified assertion failure's message to the output buffer.
     *
     * @param AssertionFailedError $assertionFailure Assertion failure.
     */
    protected function writeAssertionFailure($assertionFailure)
    {
        $this->writeNewLine();

        foreach (explode("\n", $assertionFailure) as $line) {
            $this->writeWithColor('fg-red', $line);
        }
    }

    /**
     * Writes the specified exception's message to the output buffer.
     *
     * @param ExceptionWrapper $exception Exception.
     */
    protected function writeException($exception)
    {
        $this->writeNewLine();

        do {
            $exceptionStack[] = $exception;
        } while ($exception = $exception->getPreviousWrapped());

        // Parse nested exception trace line by line.
        foreach (explode("\n", $exception = array_shift($exceptionStack)) as $line) {
            // Print exception name and message.
            if ($exception && false !== $pos = strpos($line, $exception->getClassName() . ': ')) {
                $whitespace = str_repeat(' ', ($pos += strlen($exception->getClassName())) + 2);
                $this->writeWithColor('bg-red,fg-white', $whitespace);

                // Exception name.
                $this->writeWithColor('bg-red,fg-white', sprintf(' %s ', substr($line, 0, $pos)), false);
                // Exception message.
                $this->writeWithColor('fg-red', substr($line, $pos + 1));

                $this->writeWithColor('bg-red,fg-white', $whitespace);

                $exception = array_shift($exceptionStack);

                continue;
            }

            $this->writeWithColor('fg-red', $line);
        }
    }

    /**
     * Invoked when an exception is thrown in the test runner.
     *
     * @param \Throwable|\Exception $t
     */
    protected function onAddError($t)
    {
        $this->writeProgressWithColor('fg-red,bold', 'E');

        $this->throwable = $t;
        $this->lastTestFailed = true;
        $this->flawless = false;
    }

    /**
     * Invoked when an assertion fails in the test runner.
     *
     * @param AssertionFailedError $e
     */
    protected function onAddFailure($e)
    {
        $this->writeProgressWithColor('fg-red,bold', 'F');

        $this->failure = $e;
        $this->lastTestFailed = true;
        $this->flawless = false;
    }
}
