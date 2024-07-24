--TEST--
Tests that when "test dp args" is disabled, the arguments passed from the data provider are hidden in the output.

--ARGS--
-c test/config/TestDpArgs.xml --colors=always test/CapabilitiesTest.php --filter ::testDataProvider\h

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

 50% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDataProvider with data set "foo"[0m [32m(%d ms)[0m
100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDataProvider with data set "baz"[0m [32m(%d ms)[0m


Time: %s

[30;42mOK (2 tests, 2 assertions)[0m
