<?php
namespace ScriptFUSIONTest\PHPUnitImmediateExceptionPrinter;

use PHPUnit\Framework\TestCase;

final class CapabilitiesTest extends TestCase
{
    public function testSuccess()
    {
        self::assertTrue(true);
    }

    public function testFailure()
    {
        self::assertTrue(false);
    }

    public function testException()
    {
        throw new \LogicException('foo');
    }

    public function testExceptionStackTrace()
    {
        throw new StackTraceException(new NestedStackTraceException);
    }

    public function testNestedException()
    {
        new ExceptionThrower;
    }

    public function testDiffFailure()
    {
        self::assertSame('foo', 'LogicException: foo');
    }

    public function testNotice()
    {
        $i++; // notice: undefined variable
    }

    public function testSkipped()
    {
        self::markTestSkipped();
    }

    public function testRisky()
    {
    }

    public function testIncomplete()
    {
        self::markTestIncomplete();
    }

    /**
     * @dataProvider provideData
     */
    public function testDataProvider()
    {
        self::assertTrue(true);
    }

    public function provideData()
    {
        return [
            'foo' => ['bar'],
            'baz' => ['qux'],
        ];
    }

    /**
     * @dataProvider provideSuccessesAndFailures
     */
    public function testSuccessAfterFailure($bool)
    {
        self::assertTrue($bool);
    }

    public function provideSuccessesAndFailures()
    {
        for ($i = 0; $i < 4; ++$i) {
            yield [$i !== 1];
        }
    }
}
