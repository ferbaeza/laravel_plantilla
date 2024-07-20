<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    # [Test]
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        // $response = $this->get(route('welcome'));

        $response->assertStatus(200);
    }
}
