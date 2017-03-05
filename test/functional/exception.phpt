--TEST--
An exception is thrown in the test case.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testException$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

100% [31;1mE[0m [31;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testException[0m[32m (%i ms)[0m

[41;37m                [0m
[41;37m LogicException [0m[31m foo[0m
[41;37m                [0m
[31m[0m
[31m%s%eCapabilitiesTest.php:%i[0m
[31m[0m


Time: %s

There was 1 error:

1) ScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testException
LogicException: foo

%s%eCapabilitiesTest.php:%i

[37;41mERRORS![0m
[37;41mTests: 1[0m[37;41m, Assertions: 0[0m[37;41m, Errors: 1[0m[37;41m.[0m
