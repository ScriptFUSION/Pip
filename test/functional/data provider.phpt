--TEST--
Tests that when a test is fed multiple cases by a data provider, each case is printed with its name and arguments.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter '::testDataProvider\h'

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

 50% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDataProvider with data set "foo" ('bar')[0m [32m(%d ms)[0m
100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDataProvider with data set #0 ('baz')[0m [32m(%d ms)[0m


Time: %s

[30;42mOK (2 tests, 2 assertions)[0m
