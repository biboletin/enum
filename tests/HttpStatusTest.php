<?php

use PHPUnit\Framework\TestCase;
use Bibo\Enum\HttpStatus;

final class HttpStatusTest extends TestCase
{
    public function testStatusCodeValues(): void
    {
        $this->assertSame(200, HttpStatus::OK->value);
        $this->assertSame(201, HttpStatus::Created->value);
        $this->assertSame(204, HttpStatus::NoContent->value);
        $this->assertSame(301, HttpStatus::MovedPermanently->value);
        $this->assertSame(404, HttpStatus::NotFound->value);
        $this->assertSame(418, HttpStatus::ImATeapot->value);
        $this->assertSame(500, HttpStatus::InternalServerError->value);
        $this->assertSame(503, HttpStatus::ServiceUnavailable->value);
        $this->assertSame(522, HttpStatus::ConnectionTimedOut->value);
    }

    public function testEnumCanBeAccessedByValue(): void
    {
        $this->assertSame(HttpStatus::OK, HttpStatus::from(200));
        $this->assertSame(HttpStatus::NotFound, HttpStatus::from(404));
        $this->assertSame(HttpStatus::ImATeapot, HttpStatus::from(418));
        $this->assertSame(HttpStatus::ServiceUnavailable, HttpStatus::from(503));
    }

    public function testEnumCasesAreUnique(): void
    {
        $allValues = array_map(fn(HttpStatus $status) => $status->value, HttpStatus::cases());
        $this->assertCount(count(array_unique($allValues)), $allValues, 'Duplicate enum values detected.');
    }

    public function testEnumIncludesExpectedCase(): void
    {
        $this->assertContains(HttpStatus::OK, HttpStatus::cases());
        $this->assertContains(HttpStatus::BadRequest, HttpStatus::cases());
        $this->assertContains(HttpStatus::GatewayTimeout, HttpStatus::cases());
    }
}
