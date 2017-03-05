<?php
namespace ScriptFUSIONTest\PHPUnitImmediateExceptionPrinter;

final class ExceptionThrower
{
    public function __construct()
    {
        throw new \LogicException('foo', 0, new \RuntimeException('bar'));
    }
}
