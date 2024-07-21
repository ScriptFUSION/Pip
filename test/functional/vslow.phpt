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

100% [33;1mR[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testGigaSlow[0m [31m(%d ms)[0m


Time: %s
%A
[30;43mOK, but %s![0m
[30;43mTests: 1[0m[30;43m, Assertions: 0[0m[30;43m, Risky: 1[0m[30;43m.[0m
