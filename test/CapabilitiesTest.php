<?php
namespace ScriptFUSIONTest\Pip;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Tests the capabilities of the Pip printer.
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

    public function testIncomplete(): void
    {
        self::markTestIncomplete();
    }

    public function testRisky(): void
    {
    }

    public function testNotice(): void
    {
        // Only variables should be assigned by reference.
        $foo = &self::provideData();

        self::assertTrue(true);
    }

    public function testSilencedNotice(): void
    {
        // Only variables should be assigned by reference.
        @$foo = &self::provideData();

        self::assertTrue(true);
    }

    public function testWarning(): void
    {
        $this->triggerWarning();

        self::assertTrue(true);
    }

    public function testSilencedWarning(): void
    {
        $foo = @$this->triggerWarning();

        self::assertTrue(true);
    }

    public function testWarningDuplicates(): void
    {
        $this->triggerWarning();
        $this->triggerWarning();
        $this->triggerWarning();

        foreach (1 as $n) {}

        self::assertTrue(true);
    }

    public function testDeprecation(): void
    {
        // Serializable interface is deprecated.
        new class implements \Serializable {
            function serialize() {}
            function unserialize(string $data) {}
        };

        self::assertTrue(true);
    }

    public function testSilencedDeprecation(): void
    {
        // Passing null to parameter #1 ($string) of type string is deprecated.
        @trim(null);

        self::assertTrue(true);
    }

    public function testMixedSeverities(): void
    {
        // Notice.
        $foo = &self::provideData();
        // Warning.
        $this->triggerWarning();
        // Deprecation.
        trim(null);

        self::assertTrue(true);
    }

    #[DataProvider('provideData')]

    public function testDataProvider(): void
    {
        self::assertTrue(true);
    }

    public static function provideData(): iterable
    {
        return [
            'foo' => ['bar'],
            ['baz'],
        ];
    }

    #[DataProvider('provideSuccessesAndFailures')]
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

        self::assertTrue(true);
    }

    public function testVerySlow(): void
    {
        sleep(1);

        self::assertTrue(true);
    }

    private function triggerWarning(): void
    {
        // foreach() argument must be of type array|object.
        foreach (1 as $n) {}
    }
}
