<?php

namespace Tests\src\Custom\Infrastructure;

use Tests\TestCase;

class CustomApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function hello()
    {
        $response = $this->get('/api/custom/{name}');
        $response->assertStatus(200);
        $response->assertJson([
            'data' =>[
                "entity" =>[
                    "name" => "Fer",
                    "age" =>40
                ],
                "message" => "Data saved"
            ]
        ]);
    }
}
