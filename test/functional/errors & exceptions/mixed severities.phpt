--TEST--
Tests that when multiple PHP error types are emitted, the first so emitted determines the test status but all error
messages are printed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testMixedSeverities$

--FILE_EXTERNAL--
../../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [33;1mN[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testMixedSeverities[0m [32m(%d ms)[0m

[33;1mNotice: Only variables should be assigned by reference in %s%eCapabilitiesTest.php on line %d

[0m[33;1mWarning: foreach() argument must be of type array|object, int given in %s%eCapabilitiesTest.php on line %d

[0m[33;1mDeprecated: trim(): Passing null to parameter #1 ($string) of type string is deprecated in %s%eCapabilitiesTest.php on line %d

[0m

Time: %s

[30;43mOK, but %s![0m
[30;43mTests: 1[0m[30;43m, Assertions: 1[0m[30;43m, Warnings: 1[0m[30;43m, Deprecations: 1[0m[30;43m, Notices: 1[0m[30;43m.[0m
