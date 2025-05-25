<?php

declare(strict_types=1);

namespace Tests\Enum;

use Bibo\Enum\DatabaseDriver;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Bibo\Enum\DatabaseDriver
 */
final class DatabaseDriverTest extends TestCase
{
    /**
     * @covers \Bibo\Enum\DatabaseDriver::fromString
     */
    public function testFromStringReturnsCorrectEnum(): void
    {
        $this->assertSame(DatabaseDriver::MYSQL, DatabaseDriver::fromString('mysql'));
        $this->assertSame(DatabaseDriver::POSTGRESQL, DatabaseDriver::fromString('POSTGRESQL'));
        $this->assertSame(DatabaseDriver::SQLITE, DatabaseDriver::fromString('Sqlite'));
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::fromString
     */
    public function testFromStringThrowsExceptionForInvalidDriver(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid database driver: nosql');
        DatabaseDriver::fromString('nosql');
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::isValid
     */
    public function testIsValidReturnsTrueForValidDriver(): void
    {
        $this->assertTrue(DatabaseDriver::isValid('mysql'));
        $this->assertTrue(DatabaseDriver::isValid('ORACLE'));
        $this->assertTrue(DatabaseDriver::isValid('ClickHouse'));
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::isValid
     */
    public function testIsValidReturnsFalseForInvalidDriver(): void
    {
        $this->assertFalse(DatabaseDriver::isValid('mssql'));
        $this->assertFalse(DatabaseDriver::isValid(''));
        $this->assertFalse(DatabaseDriver::isValid('sql-light'));
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::getAllDrivers
     */
    public function testGetAllDriversReturnsAllEnumCases(): void
    {
        $allDrivers = DatabaseDriver::getAllDrivers();
        $this->assertCount(15, $allDrivers);
        $this->assertContains(DatabaseDriver::MYSQL, $allDrivers);
        $this->assertContains(DatabaseDriver::FIREBIRD, $allDrivers);
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::getLowercaseName
     */
    public function testGetLowercaseName(): void
    {
        $this->assertSame('mysql', DatabaseDriver::MYSQL->getLowercaseName());
        $this->assertSame('redis', DatabaseDriver::REDIS->getLowercaseName());
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::getUppercaseName
     */
    public function testGetUppercaseName(): void
    {
        $this->assertSame('SQLITE', DatabaseDriver::SQLITE->getUppercaseName());
        $this->assertSame('MONGODB', DatabaseDriver::MONGODB->getUppercaseName());
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::getTitleCaseName
     */
    public function testGetTitleCaseName(): void
    {
        $this->assertSame('Sqlserver', DatabaseDriver::SQLSERVER->getTitleCaseName());
        $this->assertSame('Cassandra', DatabaseDriver::CASSANDRA->getTitleCaseName());
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::getSnakeCaseName
     */
    public function testGetSnakeCaseName(): void
    {
        $this->assertSame('mysql', DatabaseDriver::MYSQL->getSnakeCaseName());
        $this->assertSame('couchbase', DatabaseDriver::COUCHBASE->getSnakeCaseName());
    }

    /**
     * @covers \Bibo\Enum\DatabaseDriver::getKebabCaseName
     */
    public function testGetKebabCaseName(): void
    {
        $this->assertSame('oracle', DatabaseDriver::ORACLE->getKebabCaseName());
        $this->assertSame('dynamodb', DatabaseDriver::DYNAMODB->getKebabCaseName());
    }
}
