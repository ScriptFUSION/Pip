--TEST--
Test that first notice determines test status and prior silenced warning does not.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testSilencedWarningNotAffectsStatus$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [33;1mN[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSilencedWarningNotAffectsStatus[0m [32m(%d ms)[0m
[33;1m
Notice: Only variables should be assigned by reference in %s%eCapabilitiesTest.php on line %d

[0m

Time: %s
%A
[30;43mOK, but %s![0m
[30;43mTests: 1[0m[30;43m, Assertions: 1[0m[30;43m, Notices: 1[0m[30;43m.[0m
