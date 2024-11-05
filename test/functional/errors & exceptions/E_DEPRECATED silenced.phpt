--TEST--
Tests that when a test emits a PHP deprecation notice that is suppressed, the test is not marked and the deprecation
message is not printed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testSilencedDeprecation$

--FILE_EXTERNAL--
../../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSilencedDeprecation[0m [32m(%d ms)[0m


Time: %s

[30;42mOK (1 test, 1 assertion)[0m
