--TEST--
A test is marked "warning".

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testWarning$

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

100% [33;1mW[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testWarning[0m [32m(%d ms)[0m


Time: %s
%A
[30;43mOK, but %s![0m
[30;43mTests: 1[0m[30;43m, Assertions: 1[0m[30;43m, Warnings: 1[0m[30;43m.[0m
