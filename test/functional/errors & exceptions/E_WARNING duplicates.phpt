--TEST--
Tests that when a test emits a PHP warning multiple times, only unique occurrences are printed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testWarningDuplicates$

--FILE_EXTERNAL--
../../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [33;1mW[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testWarningDuplicates[0m [32m(%d ms)[0m

[33;1mWarning: foreach() argument must be of type array|object, int given in %s%eCapabilitiesTest.php on line %d

[0m[33;1mWarning: foreach() argument must be of type array|object, int given in %s%eCapabilitiesTest.php on line %d

[0m

Time: %s

[30;43mOK, but %s![0m
[30;43mTests: 1[0m[30;43m, Assertions: 1[0m[30;43m, Warnings: 2[0m[30;43m.[0m
