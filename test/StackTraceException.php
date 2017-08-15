<?php
namespace ScriptFUSIONTest\PHPUnitImmediateExceptionPrinter;

class StackTraceException extends \RuntimeException
{
    public function __construct(StackTraceException $previous = null)
    {
        parent::__construct("$this", 0, $previous);
    }
}
