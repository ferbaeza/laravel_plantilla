<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Custom\Application\WelcomeCommand;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;


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
        $command = new WelcomeCommand('4822');
        $response = CommandBusFacade::process($command);

        dd($response);
        $this->assertIsArray($response);
    }


}
