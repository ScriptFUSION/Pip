<?php
namespace ScriptFUSIONTest\Pip;

use PHPUnit\Framework\TestCase;

/**
 * Tests the capabilities of the PIP printer.
 */
final class CapabilitiesTest extends TestCase
{
    public function testSuccess(): void
    {
        self::assertTrue(true);
    }

    public function testFailure(): void
    {
        self::assertTrue(false);
    }

    public function testException(): void
    {
        throw new \LogicException('foo');
    }

    public function testNestedException(): void
    {
        new ExceptionThrower;
    }

    public function testDiffFailure(): void
    {
        self::assertSame('foo', 'LogicException: foo');
    }

    public function testSkipped(): void
    {
        self::markTestSkipped();
    }

    public function testRisky(): void
    {
    }

    public function testIncomplete(): void
    {
        self::markTestIncomplete();
    }

    public function testNotice(): void
    {
        // Only variables should be assigned by reference.
        $foo = &self::provideData();

        self::assertTrue(true);
    }

    public function testWarning(): void
    {
        // zend.assertions may be completely enabled or disabled only in php.ini.
        ini_set('zend.assertions', -1);

        self::assertTrue(true);
    }

    public function testDeprecation(): void
    {
        // Creation of dynamic property is deprecated.
        $this->foo = 'foo';

        self::assertTrue(true);
    }

    /**
     * @dataProvider provideData
     */
    public function testDataProvider(): void
    {
        self::assertTrue(true);
    }

    public static function provideData(): iterable
    {
        return [
            'foo' => ['bar'],
            'baz' => ['qux'],
        ];
    }

    /**
     * @dataProvider provideSuccessesAndFailures
     */
    public function testSuccessAfterFailure($bool): void
    {
        self::assertTrue($bool);
    }

    public static function provideSuccessesAndFailures(): iterable
    {
        for ($i = 0; $i < 4; ++$i) {
            yield [$i !== 1];
        }
    }

    public function testSlow(): void
    {
        usleep(200_000);
    }

    public function testGigaSlow(): void
    {
        sleep(1);
    }
}
