--TEST--
A successful test is fed two cases by a data provider.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter '::testDataProvider\h'

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

 50% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testDataProvider with data set "foo" ('bar')[0m[32m (%i ms)[0m
100% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testDataProvider with data set "baz" ('qux')[0m[32m (%i ms)[0m


Time: %s

[30;42mOK (2 tests, 2 assertions)[0m
