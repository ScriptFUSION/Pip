--TEST--
An successful test is repeated 80 times.

--ARGS--
-c test --colors=always test/CapabilitiesTest --filter ::testSuccess$ --repeat 80

--FILE_EXTERNAL--
PHPUnit runner.php

--EXPECTF--
PHPUnit %s

  1% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
  3% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
  4% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
  5% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
  6% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
  8% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
  9% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 10% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 11% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 13% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 14% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 15% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 16% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 18% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 19% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 20% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 21% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 23% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 24% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 25% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 26% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 28% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 29% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 30% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 31% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 33% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 34% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 35% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 36% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 38% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 39% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 40% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 41% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 43% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 44% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 45% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 46% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 48% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 49% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 50% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 51% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 53% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 54% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 55% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 56% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 58% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 59% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 60% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 61% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 63% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 64% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 65% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 66% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 68% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 69% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 70% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 71% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 73% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 74% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 75% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 76% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 78% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 79% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 80% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 81% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 83% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 84% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 85% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 86% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 88% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 89% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 90% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 91% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 93% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 94% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 95% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 96% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 98% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
 99% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m
100% . [32;1mScriptFUSIONTest\PHPUnitImmediateExceptionPrinter\CapabilitiesTest::testSuccess[0m[32m (%i ms)[0m


Time: %s

[30;42mOK (80 tests, 80 assertions)[0m
