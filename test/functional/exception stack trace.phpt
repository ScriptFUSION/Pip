--TEST--
An exception message containing its own stack trace is formatted correctly.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testExceptionStackTrace$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

100% [31;1mE[0m [31;1mLifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testExceptionStackTrace[0m[32m (%d ms)[0m

[41;37m                                                                       [0m
[41;37m LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\StackTraceException [0m[31m %s in %s%eCapabilitiesTest.php:25[0m
[41;37m                                                                       [0m
[31mStack trace:[0m
[31m#0 [internal function]: LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest->testExceptionStackTrace()[0m
%a
[31m#%d {main}[0m
[31m[0m
[31m%s%eCapabilitiesTest.php:25[0m
[31m[0m
[31mCaused by[0m
[41;37m                                                                             [0m
[41;37m LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\NestedStackTraceException [0m[31m %s in %s%eCapabilitiesTest.php:%d[0m
[41;37m                                                                             [0m
[31mStack trace:[0m
[31m#0 [internal function]: LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest->testExceptionStackTrace()[0m
%a
[31m#%d {main}[0m
[31m[0m
[31m%s%eCapabilitiesTest.php:%d[0m
[31m[0m


Time: %s

There was 1 error:

1) LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testExceptionStackTrace
LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\StackTraceException: %s in %s%eCapabilitiesTest.php:%d
Stack trace:
#0 [internal function]: LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest->testExceptionStackTrace()
%a
#%d {main}

%s%eCapabilitiesTest.php:25

Caused by
LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\NestedStackTraceException: %s in %s%eCapabilitiesTest.php:%d
Stack trace:
#0 [internal function]: LifeWorksForksTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest->testExceptionStackTrace()
%a
#%d {main}

%s%eCapabilitiesTest.php:25

[37;41mERRORS![0m
[37;41mTests: 1[0m[37;41m, Assertions: 0[0m[37;41m, Errors: 1[0m[37;41m.[0m
