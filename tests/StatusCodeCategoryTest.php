<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Bibo\Enum\StatusCodeCategory;

/**
 * @covers StatusCodeCategory
 * @uses StatusCodeCategory
 */
final class StatusCodeCategoryTest extends TestCase
{
    /**
     * @covers StatusCodeCategory::fromString
     */
    public function testFromStringReturnsCorrectEnum(): void
    {
        $this->assertSame(StatusCodeCategory::INFORMATIONAL, StatusCodeCategory::fromString('informational'));
        $this->assertSame(StatusCodeCategory::SUCCESS, StatusCodeCategory::fromString('Success'));
        $this->assertSame(StatusCodeCategory::REDIRECTION, StatusCodeCategory::fromString('REDIRECTION'));
        $this->assertSame(StatusCodeCategory::CLIENT_ERROR, StatusCodeCategory::fromString('Client Error'));
        $this->assertSame(StatusCodeCategory::SERVER_ERROR, StatusCodeCategory::fromString('server error'));
    }

    /**
     * @covers StatusCodeCategory::fromString 
     */
    public function testFromStringThrowsOnInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid status code category: unknown');
        StatusCodeCategory::fromString('unknown');
    }

    /**
     * @covers StatusCodeCategory::isValid
     */
    public function testIsValidReturnsTrueForValidValues(): void
    {
        $this->assertTrue(StatusCodeCategory::isValid('success'));
        $this->assertTrue(StatusCodeCategory::isValid('Server Error'));
    }

    /**
     * @covers StatusCodeCategory::isValid
     */
    public function testIsValidReturnsFalseForInvalidValues(): void
    {
        $this->assertFalse(StatusCodeCategory::isValid('fatal'));
        $this->assertFalse(StatusCodeCategory::isValid(''));
    }

    /**
     * @covers StatusCodeCategory::getReadableName
     */
    public function testGetReadableNameReturnsExpectedString(): void
    {
        $this->assertSame('Informational', StatusCodeCategory::INFORMATIONAL->getReadableName());
        $this->assertSame('Client Error', StatusCodeCategory::CLIENT_ERROR->getReadableName());
    }

    /**
     * @covers StatusCodeCategory::all
     */
    public function testAllReturnsAllCategories(): void
    {
        $all = StatusCodeCategory::all();
        $this->assertCount(5, $all);
        $this->assertContainsEquals(StatusCodeCategory::SUCCESS, $all);
    }

    /**
     * @covers StatusCodeCategory::toArray
     */
    public function testToArrayReturnsCorrectStructure(): void
    {
        $expected = [
            'name' => 'SUCCESS',
            'value' => 'Success',
        ];

        $this->assertSame($expected, StatusCodeCategory::SUCCESS->toArray());
    }

    /**
     * @covers StatusCodeCategory::getLowercaseName
     */
    public function testLowercaseNameReturnsExpected(): void
    {
        $this->assertSame('client error', StatusCodeCategory::CLIENT_ERROR->getLowercaseName());
    }

    /**
     * @covers StatusCodeCategory::getUppercaseName
     */
    public function testUppercaseNameReturnsExpected(): void
    {
        $this->assertSame('CLIENT ERROR', StatusCodeCategory::CLIENT_ERROR->getUppercaseName());
    }

    /**
     * @covers StatusCodeCategory::getTitleCaseName
     */
    public function testTitleCaseNameReturnsExpected(): void
    {
        $this->assertSame('Client Error', StatusCodeCategory::CLIENT_ERROR->getTitleCaseName());
    }
}
