--TEST--
Tests that when a test is marked "skipped", the test is so marked.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testSkipped$

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [36;1mS[0m [36;1mScriptFUSIONTest\Pip\CapabilitiesTest::testSkipped[0m [32m(%d ms)[0m


Time: %s

[30;4%dmOK, but some tests were skipped![0m
[30;4%dmTests: 1[0m[30;4%dm, Assertions: 0[0m[30;4%dm, Skipped: 1[0m[30;4%dm.[0m
