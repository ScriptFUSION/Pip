--TEST--
Tests that when a test emits a PHP deprecation notice, the test is so marked and the deprecation message is printed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testDeprecation$

--FILE_EXTERNAL--
../../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [33;1mD[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDeprecation[0m [32m(%d ms)[0m

[33;1mDeprecated: Serializable@anonymous implements the Serializable interface, which is deprecated. Implement __serialize() and __unserialize() instead (or in addition, if support for old PHP versions is necessary) in %s%eCapabilitiesTest.php on line %d

[0m

Time: %s

[30;43mOK, but %s![0m
[30;43mTests: 1[0m[30;43m, Assertions: 1[0m[30;43m, Deprecations: 1[0m[30;43m.[0m
