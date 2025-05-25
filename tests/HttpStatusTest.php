<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Bibo\Enum\HttpStatus;

final class HttpStatusTest extends TestCase
{
    /**
     * @covers HttpStatus::OK
     * @covers HttpStatus::Created
     * @covers HttpStatus::NoContent
     * @covers HttpStatus::MovedPermanently
     * @covers HttpStatus::NotFound
     * @covers HttpStatus::ImATeapot
     * @covers HttpStatus::InternalServerError
     * @covers HttpStatus::ServiceUnavailable
     * @covers HttpStatus::ConnectionTimedOut
     */
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

    /**
     * @covers HttpStatus::from
     * @covers HttpStatus::resolve
     */
    public function testEnumCanBeAccessedByValue(): void
    {
        $this->assertSame(HttpStatus::OK, HttpStatus::from(200));
        $this->assertSame(HttpStatus::NotFound, HttpStatus::from(404));
        $this->assertSame(HttpStatus::ImATeapot, HttpStatus::from(418));
        $this->assertSame(HttpStatus::ServiceUnavailable, HttpStatus::from(503));
    }

    /**
     * @covers HttpStatus::from
     * @covers HttpStatus::resolve
     * @covers HttpStatus::cases
     */
    public function testEnumCasesAreUnique(): void
    {
        $allValues = array_map(fn(HttpStatus $status) => $status->value, HttpStatus::cases());
        $this->assertCount(count(array_unique($allValues)), $allValues, 'Duplicate enum values detected.');
    }

    /**
     * @covers HttpStatus::cases
     */
    public function testEnumIncludesExpectedCase(): void
    {
        $this->assertContainsEquals(HttpStatus::OK, HttpStatus::cases());
        $this->assertContainsEquals(HttpStatus::BadRequest, HttpStatus::cases());
        $this->assertContainsEquals(HttpStatus::GatewayTimeout, HttpStatus::cases());
    }

    /**
     * @covers HttpStatus::message
     */
    public function testMessagesAreCorrect(): void
    {
        $this->assertSame('OK', HttpStatus::OK->message());
        $this->assertSame('Not Found', HttpStatus::NotFound->message());
        $this->assertSame('I\'m a teapot', HttpStatus::ImATeapot->message());
        $this->assertSame('Service Unavailable', HttpStatus::ServiceUnavailable->message());
        $this->assertSame('Unknown Status Code', HttpStatus::resolve(999)->message()); // Fallback/default
    }

    /**
     * @covers HttpStatus::isSuccess
     * @covers HttpStatus::isRedirection
     * @covers HttpStatus::isClientError
     * @covers HttpStatus::isServerError
     */
    public function testCategoryHelpers(): void
    {
        $this->assertTrue(HttpStatus::OK->isSuccess());
        $this->assertTrue(HttpStatus::MovedPermanently->isRedirection());
        $this->assertTrue(HttpStatus::BadRequest->isClientError());
        $this->assertTrue(HttpStatus::InternalServerError->isServerError());

        $this->assertFalse(HttpStatus::OK->isClientError());
        $this->assertFalse(HttpStatus::OK->isServerError());
        $this->assertFalse(HttpStatus::OK->isRedirection());
    }

    /**
     * @covers HttpStatus::successMessages
     * @covers HttpStatus::clientMessages
     * @covers HttpStatus::serverMessages
     */
    public function testGroupedMessagesContainExpectedCodes(): void
    {
        // Call instance methods on any enum case, e.g., HttpStatus::OK
        $success = HttpStatus::OK->successMessages();
        $this->assertArrayHasKey(HttpStatus::OK->value, $success);
        $this->assertSame('OK', $success[HttpStatus::OK->value]);

        $client = HttpStatus::BadRequest->clientMessages();
        $this->assertArrayHasKey(HttpStatus::NotFound->value, $client);
        $this->assertSame('Not Found', $client[HttpStatus::NotFound->value]);

        $server = HttpStatus::InternalServerError->serverMessages();
        $this->assertArrayHasKey(HttpStatus::InternalServerError->value, $server);
        $this->assertSame('Internal Server Error', $server[HttpStatus::InternalServerError->value]);
    }

}
