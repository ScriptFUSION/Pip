--TEST--
An assertion fails.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testFailure$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

100% [31;1mF[0m [31;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testFailure[0m[32m (%d ms)[0m

[31mFailed asserting that false is true.[0m
[31m[0m
[31m%s%eCapabilitiesTest.php:%d[0m
[31m[0m


Time: %s

There was 1 failure:

1) ScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testFailure
Failed asserting that false is true.

%s%eCapabilitiesTest.php:%d

[37;41mFAILURES![0m
[37;41mTests: 1[0m[37;41m, Assertions: 1[0m[37;41m, Failures: 1[0m[37;41m.[0m
