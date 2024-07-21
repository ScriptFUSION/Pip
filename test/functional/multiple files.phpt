--TEST--
Tests that multiple files tested together are counted correctly.

--ARGS--
-c test --colors=always test/multi

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

 50% . [32;1mScriptFUSIONTest\Pip\multi\OneTest::testSuccess[0m [32m(%d ms)[0m
100% [31;1mF[0m [31;1mScriptFUSIONTest\Pip\multi\TwoTest::testFailure[0m [32m(%d ms)[0m

[31mFailed asserting that false is true.
[0m
[31m%s%eTwoTest.php:%d
[0m


Time: %s

There was 1 failure:

1) ScriptFUSIONTest\Pip\multi\TwoTest::testFailure
Failed asserting that false is true.

%s%eTwoTest.php:%d

[37;41mFAILURES![0m
[37;41mTests: 2[0m[37;41m, Assertions: 2[0m[37;41m, Failures: 1[0m[37;41m.[0m
