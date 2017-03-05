--TEST--
A test is skipped.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testSkipped$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

100% [36;1mS[0m [36;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSkipped[0m[32m (%i ms)[0m


Time: %s

[30;43mOK, but incomplete, skipped, or risky tests![0m
[30;43mTests: 1[0m[30;43m, Assertions: 0[0m[30;43m, Skipped: 1[0m[30;43m.[0m
