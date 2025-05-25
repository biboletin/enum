<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Bibo\Enum\CacheDriver;

/**
 * @covers CacheDriver
 */
final class CacheDriverTest extends TestCase
{
    /**
     * @covers CacheDriver::fromString
     * @return void
     */
    public function testFromStringReturnsCorrectEnum(): void
    {
        $this->assertSame(CacheDriver::APCU, CacheDriver::fromString('apcu'));
        $this->assertSame(CacheDriver::FILE, CacheDriver::fromString('FiLe'));
        $this->assertSame(CacheDriver::MEMORY, CacheDriver::fromString('MEMORY'));
        $this->assertSame(CacheDriver::REDIS, CacheDriver::fromString('redis'));
        $this->assertSame(CacheDriver::MEMCACHED, CacheDriver::fromString('Memcached'));
        $this->assertSame(CacheDriver::DATABASE, CacheDriver::fromString('DATABASE'));
    }

    /**
     * @covers CacheDriver::fromString
     * @return void
     */
    public function testFromStringThrowsForInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid cache driver: invalid');
        CacheDriver::fromString('invalid');
    }

    /**
     * @covers CacheDriver::isValid
     * @return void
     */
    public function testIsValidReturnsTrueForValidDrivers(): void
    {
        $this->assertTrue(CacheDriver::isValid('apcu'));
        $this->assertTrue(CacheDriver::isValid('FILE'));
        $this->assertTrue(CacheDriver::isValid('redis'));
    }

    /**
     * @covers CacheDriver::isValid
     * @return void
     */
    public function testIsValidReturnsFalseForInvalidDrivers(): void
    {
        $this->assertFalse(CacheDriver::isValid('foobar'));
        $this->assertFalse(CacheDriver::isValid(''));
        $this->assertFalse(CacheDriver::isValid('null'));
    }

    /**
     * @covers CacheDriver::all
     * @return void
     */
    public function testAllReturnsAllCacheDrivers(): void
    {
        $expected = [
            CacheDriver::APCU,
            CacheDriver::FILE,
            CacheDriver::MEMORY,
            CacheDriver::REDIS,
            CacheDriver::MEMCACHED,
            CacheDriver::DATABASE,
        ];
        $this->assertEquals($expected, CacheDriver::all());
    }

    /**
     * @covers CacheDriver::toArray
     * @return void
     */
    public function testToArrayReturnsCorrectStructure(): void
    {
        $driver = CacheDriver::MEMCACHED;
        $this->assertSame([
            'name' => 'MEMCACHED',
            'value' => 'memcached',
        ], $driver->toArray());
    }

    /**
     * @covers CacheDriver::getName
     * @covers CacheDriver::getValue
     * @covers CacheDriver::getLowercaseName
     * @covers CacheDriver::getUppercaseName
     * @covers CacheDriver::getLowercaseValue
     * @covers CacheDriver::getUppercaseValue
     * @covers CacheDriver::getTitleCaseValue
     * @return void
     */
    public function testCaseNamingMethods(): void
    {
        $driver = CacheDriver::REDIS;
        $this->assertSame('REDIS', $driver->getName());
        $this->assertSame('redis', $driver->getValue());
        $this->assertSame('redis', $driver->getLowercaseName());
        $this->assertSame('REDIS', $driver->getUppercaseName());
        $this->assertSame('redis', $driver->getLowercaseValue());
        $this->assertSame('REDIS', $driver->getUppercaseValue());
        $this->assertSame('Redis', $driver->getTitleCaseValue());
    }

    /**
     * @covers CacheDriver::getName
     * @covers CacheDriver::cases
     * @return void
     */
    public function testEnumValuesAreUnique(): void
    {
        $values = array_map(fn(CacheDriver $d) => $d->value, CacheDriver::cases());
        $this->assertCount(count(array_unique($values)), $values);
    }

    /**
     * @covers CacheDriver::cases
     * @return void
     */
    public function testEnumContainsExpectedCases(): void
    {
        $cases = CacheDriver::cases();
        $this->assertContains(CacheDriver::FILE, $cases);
        $this->assertContains(CacheDriver::DATABASE, $cases);
        $this->assertContains(CacheDriver::MEMORY, $cases);
    }
}
