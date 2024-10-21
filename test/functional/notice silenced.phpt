--TEST--
Tests that when a test generates a notice that is suppressed, the notice is not printed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testSilencedNotice$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSilencedNotice[0m [32m(%d ms)[0m


Time: %s
%A
[30;42mOK (1 test, 1 assertion)[0m
