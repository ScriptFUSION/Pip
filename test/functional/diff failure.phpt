--TEST--
Tests that when an assertion fails, a diff is printed immediately.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testDiffFailure$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [31;1mF[0m [31;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDiffFailure[0m [32m(%d ms)[0m

[31mFailed asserting that two strings are identical.
--- Expected
+++ Actual
@@ @@
-'foo'
+'LogicException: foo'
[0m
[31m%s%eCapabilitiesTest.php:%d
[0m


Time: %s

There was 1 failure:

1) ScriptFUSIONTest\Pip\CapabilitiesTest::testDiffFailure
Failed asserting that two strings are identical.
--- Expected
+++ Actual
@@ @@
-%Sfoo%S
+%SLogicException: foo%S

%s%eCapabilitiesTest.php:%d

[37;41mFAILURES![0m
[37;41mTests: 1[0m[37;41m, Assertions: 1[0m[37;41m, Failures: 1[0m[37;41m.[0m
