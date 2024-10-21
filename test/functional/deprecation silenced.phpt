--TEST--
Tests that when a test generates a deprecation that is suppressed, the deprecation is not printed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testSilencedDeprecation$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSilencedDeprecation[0m [32m(%d ms)[0m


Time: %s
%A
[30;42mOK (1 test, 1 assertion)[0m
