--TEST--
An assertion fails and produces a diff.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testDiffFailure$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

100% [31;1mF[0m [31;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testDiffFailure[0m[32m (%i ms)[0m

[31mFailed asserting that two strings are identical.[0m
[31m--- Expected[0m
[31m+++ Actual[0m
[31m@@ @@[0m
[31m-foo[0m
[31m+LogicException: foo[0m
[31m[0m
[31m%s%eCapabilitiesTest.php:%i[0m
[31m[0m


Time: %s

There was 1 failure:

1) ScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testDiffFailure
Failed asserting that two strings are identical.
--- Expected
+++ Actual
@@ @@
-foo
+LogicException: foo

%s%eCapabilitiesTest.php:%i

[37;41mFAILURES![0m
[37;41mTests: 1[0m[37;41m, Assertions: 1[0m[37;41m, Failures: 1[0m[37;41m.[0m
