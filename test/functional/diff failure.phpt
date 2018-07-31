--TEST--
An assertion fails and produces a diff.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testDiffFailure$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

100% [31;1mF[0m [31;1mLifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testDiffFailure[0m[32m (%d ms)[0m

[31mFailed asserting that two strings are identical.[0m
[31m--- Expected[0m
[31m+++ Actual[0m
[31m@@ @@[0m
[31m-%Sfoo%S[0m
[31m+%SLogicException: foo%S[0m
[31m[0m
[31m%s%eCapabilitiesTest.php:%d[0m
[31m[0m


Time: %s

There was 1 failure:

1) LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testDiffFailure
Failed asserting that two strings are identical.
--- Expected
+++ Actual
@@ @@
-%Sfoo%S
+%SLogicException: foo%S

%s%eCapabilitiesTest.php:%d

[37;41mFAILURES![0m
[37;41mTests: 1[0m[37;41m, Assertions: 1[0m[37;41m, Failures: 1[0m[37;41m.[0m
