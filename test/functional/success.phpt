--TEST--
An assertion succeeds.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testSuccess$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

100% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%d ms)[0m


Time: %s

[30;42mOK (1 test, 1 assertion)[0m
