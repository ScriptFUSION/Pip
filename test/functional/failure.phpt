--TEST--
An assertion fails.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testFailure$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [31;1mF[0m [31;1mScriptFUSIONTest\Pip\CapabilitiesTest::testFailure[0m [32m(%d ms)[0m

[31mFailed asserting that false is true.
[0m
[31m%s%eCapabilitiesTest.php:%d
[0m


Time: %s

There was 1 failure:

1) ScriptFUSIONTest\Pip\CapabilitiesTest::testFailure
Failed asserting that false is true.

%s%eCapabilitiesTest.php:%d

[37;41mFAILURES![0m
[37;41mTests: 1[0m[37;41m, Assertions: 1[0m[37;41m, Failures: 1[0m[37;41m.[0m
