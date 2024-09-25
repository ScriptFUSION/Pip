--TEST--
Tests that when a test generates a warning that is suppressed, the warning is not printed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testSilencedWarning$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [33;1mW[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSilencedWarning[0m [32m(%d ms)[0m


Time: %s
%A
[30;42mOK (1 test, 1 assertion)[0m
