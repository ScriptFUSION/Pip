<?php
namespace ScriptFUSIONTest\PHPUnitImmediateExceptionPrinter;

final class CapabilitiesTest extends \PHPUnit_Framework_TestCase
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

    public function testNestedException()
    {
        new ExceptionThrower;
    }

    public function testDiffFailure()
    {
        self::assertSame('foo', 'LogicException: foo');
    }

    public function testSkipped()
    {
        $this->markTestSkipped();
    }

    public function testRisky()
    {
    }

    public function testIncomplete()
    {
        $this->markTestIncomplete();
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
}
