<?php

declare(strict_types=1);

namespace Tests\Enum;

use Bibo\Enum\RedirectType;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Bibo\Enum\RedirectType
 */
final class RedirectTypeTest extends TestCase
{
    /**
     * @covers \Bibo\Enum\RedirectType::fromInt
     */
    public function testFromIntReturnsCorrectEnum(): void
    {
        $this->assertSame(RedirectType::PERMANENT, RedirectType::fromInt(301));
        $this->assertSame(RedirectType::TEMPORARY, RedirectType::fromInt(302));
        $this->assertSame(RedirectType::SEE_OTHER, RedirectType::fromInt(303));
        $this->assertSame(RedirectType::NOT_MODIFIED, RedirectType::fromInt(304));
        $this->assertSame(RedirectType::USE_PROXY, RedirectType::fromInt(305));
        $this->assertSame(RedirectType::SWITCH_PROXY, RedirectType::fromInt(306));
        $this->assertSame(RedirectType::TEMPORARY_REDIRECT, RedirectType::fromInt(307));
        $this->assertSame(RedirectType::PERMANENT_REDIRECT, RedirectType::fromInt(308));
        $this->assertSame(RedirectType::MULTIPLE_CHOICES, RedirectType::fromInt(300));
    }

    /**
     * @covers \Bibo\Enum\RedirectType::fromInt
     */
    public function testFromIntThrowsOnInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid redirect type: 999');
        RedirectType::fromInt(999);
    }

    /**
     * @covers \Bibo\Enum\RedirectType::isValid
     */
    public function testIsValidReturnsTrueForValidValues(): void
    {
        $this->assertTrue(RedirectType::isValid(301));
        $this->assertTrue(RedirectType::isValid(308));
        $this->assertTrue(RedirectType::isValid(300));
    }

    /**
     * @covers \Bibo\Enum\RedirectType::isValid
     */
    public function testIsValidReturnsFalseForInvalidValues(): void
    {
        $this->assertFalse(RedirectType::isValid(404));
        $this->assertFalse(RedirectType::isValid(0));
        $this->assertFalse(RedirectType::isValid(-1));
    }

    /**
     * @covers \Bibo\Enum\RedirectType::toInt
     */
    public function testToIntReturnsIntegerValue(): void
    {
        $this->assertSame(301, RedirectType::PERMANENT->toInt());
        $this->assertSame(304, RedirectType::NOT_MODIFIED->toInt());
    }

    /**
     * @covers \Bibo\Enum\RedirectType::toString
     */
    public function testToStringReturnsHumanReadableName(): void
    {
        $this->assertSame('Permanent Redirect', RedirectType::PERMANENT->toString());
        $this->assertSame('Temporary Redirect', RedirectType::TEMPORARY->toString());
        $this->assertSame('See Other', RedirectType::SEE_OTHER->toString());
        $this->assertSame('Use Proxy', RedirectType::USE_PROXY->toString());
        $this->assertSame('Multiple Choices', RedirectType::MULTIPLE_CHOICES->toString());
    }

    /**
     * @covers \Bibo\Enum\RedirectType::all
     */
    public function testAllReturnsAllRedirectTypes(): void
    {
        $expected = [
            RedirectType::TEMPORARY,
            RedirectType::PERMANENT,
            RedirectType::SEE_OTHER,
            RedirectType::NOT_MODIFIED,
            RedirectType::USE_PROXY,
            RedirectType::SWITCH_PROXY,
            RedirectType::TEMPORARY_REDIRECT,
            RedirectType::PERMANENT_REDIRECT,
            RedirectType::MULTIPLE_CHOICES,
        ];

        $this->assertSame($expected, RedirectType::all());
    }

    /**
     * @covers \Bibo\Enum\RedirectType::toArray
     */
    public function testToArrayReturnsCorrectStructure(): void
    {
        $data = RedirectType::PERMANENT->toArray();

        $this->assertIsArray($data);
        $this->assertSame('PERMANENT', $data['name']);
        $this->assertSame(301, $data['value']);
    }
}
