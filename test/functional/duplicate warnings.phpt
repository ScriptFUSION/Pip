--TEST--
PHPUnit only reports warnings with globally unique locations within executed tests.

--ARGS--
-c test --colors=always test/CapabilitiesTest.php --filter ::testDuplicateWarnings

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

 33% [33;1mW[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDuplicateWarningsA[0m [32m(%d ms)[0m
[33;1m
Warning: foreach() argument must be of type array|object, int given in %s%eCapabilitiesTest.php on line %d

[0m 66% [33;1mW[0m [33;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDuplicateWarningsB[0m [32m(%d ms)[0m
[33;1m
Warning: foreach() argument must be of type array|object, int given in %s%eCapabilitiesTest.php on line %d

[0m[33;1m
Warning: foreach() argument must be of type array|object, int given in %s%eCapabilitiesTest.php on line %d
[0m100% . [32;1mScriptFUSIONTest\Pip\CapabilitiesTest::testDuplicateWarningsC[0m [32m(%d ms)[0m


Time: %s
%A
[30;43mOK, but %s![0m
[30;43mTests: 3[0m[30;43m, Assertions: 3[0m[30;43m, Warnings: 2[0m[30;43m.[0m
