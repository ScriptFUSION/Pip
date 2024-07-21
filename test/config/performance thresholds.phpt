--TEST--
Tests that when custom performance thresholds are specified, they overrides the defaults.

--ARGS--
-c test/config/PerformanceThresholds.xml --colors=always test/config/PerformanceThresholdsTest.php

--FILE_EXTERNAL--
../PHPUnit runner.php

--EXPECTF--
PHPUnit %s

Runtime: %s
Configuration: %s

 50% . [32;1mScriptFUSIONTest\Pip\config\PerformanceThresholdsTest::testSlow[0m [33m(%d ms)[0m
100% . [32;1mScriptFUSIONTest\Pip\config\PerformanceThresholdsTest::testVslow[0m [31m(%d ms)[0m


Time: %s

[30;42mOK (2 tests, 2 assertions)[0m
