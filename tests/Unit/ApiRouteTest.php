<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Custom\Application\WelcomeCommand;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;

class ApiRouteTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_event(): void
    {
        $eventId = UuidValue::id();
        $command = new WelcomeCommand($eventId);
        $response = CommandBusFacade::process($command);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('EventId', $response);
        $this->assertEquals($eventId, $response['EventId'][0]);
    }
}
