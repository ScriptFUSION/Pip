--TEST--
Tests that when a test is marked "risky", the test is so marked and the risk reason is printed immediately.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testRisky$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [33;1mR[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testRisky[0m [32m(%d ms)[0m
[33;1m
Risky: This test did not perform any assertions in %s%eCapabilitiesTest.php on line %d

[0m

Time: %s

There was 1 risky test:

1) ScriptFUSIONTest\Pip\CapabilitiesTest::testRisky
This test did not perform any assertions

%s%eCapabilitiesTest.php:%d

[30;43mOK, but %s![0m
[30;43mTests: 1[0m[30;43m, Assertions: 0[0m[30;43m, Risky: 1[0m[30;43m.[0m
