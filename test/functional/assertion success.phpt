--TEST--
Tests that when an assertion succeeds, the test is so marked.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testSuccess$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSuccess[0m [32m(%d ms)[0m


Time: %s

[30;42mOK (1 test, 1 assertion)[0m
