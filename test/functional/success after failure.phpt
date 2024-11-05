--TEST--
Tests that when successful tests follow a failed test, the flawed test suite marker (!) is displayed.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter '::testSuccessAfterFailure\h'

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

 25% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSuccessAfterFailure with data set #0 (true)[0m [32m(%d ms)[0m
 50% [31;1mF[0m [31;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSuccessAfterFailure with data set #1 (false)[0m [32m(%d ms)[0m

[31mFailed asserting that false is true.
[0m
[31m%s%eCapabilitiesTest.php:%d
[0m
 75% [31m![0m [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSuccessAfterFailure with data set #2 (true)[0m [32m(%d ms)[0m
100% [31m![0m [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSuccessAfterFailure with data set #3 (true)[0m [32m(%d ms)[0m


Time: %s

There was 1 failure:

1) ScriptFUSIONTest\Pip\CapabilitiesTest::testSuccessAfterFailure with data set #1 (false)
Failed asserting that false is true.

%s%eCapabilitiesTest.php:%d

[37;41mFAILURES![0m
[37;41mTests: 4[0m[37;41m, Assertions: 4[0m[37;41m, Failures: 1[0m[37;41m.[0m
