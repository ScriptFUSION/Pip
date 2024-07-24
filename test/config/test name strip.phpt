--TEST--
Tests that when "test name strip" is specified, the matching portion of the test name is stripped from the output.

--ARGS--
-c test/config/TestNameStrip.xml --colors=always test/CapabilitiesTest.php --filter ::testSuccess$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% . [32;1mCapabilitiesTest::testSuccess[0m [32m(%d ms)[0m


Time: %s

[30;42mOK (1 test, 1 assertion)[0m
