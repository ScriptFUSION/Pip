--TEST--
Tests that when a test takes more than 1s to complete, its timer output is shown in red.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testGigaSlow$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testGigaSlow[0m [31m(%d ms)[0m


Time: %s
%A
[30;42mOK (1 test, 1 assertion)[0m
