<?php
namespace ScriptFUSIONTest\Pip;

final class ExceptionThrower
{
    public function __construct()
    {
        throw new \LogicException('foo', 0, new \RuntimeException('bar'));
    }
}
