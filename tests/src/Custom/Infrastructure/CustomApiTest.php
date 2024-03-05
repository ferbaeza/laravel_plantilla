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
        $name = 'Fer';
        $response = $this->get("/api/custom/hello/". $name);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                "entity" => [
                    "nombre" ,
                    "edad" 
                ],
                "message" ,
            ],
            "success" ,
            "status"
        ]);
    }

    /** @test */
    public function body()
    {
        $nombre = 'Fernando Baeza Hurtado';
        $response = $this->post('/api/custom/body', ['nombre' => $nombre, 'edad' => 40]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                "entity" => [
                    "nombre",
                    "edad"
                ],
                "message",
            ],
            "success",
            "status"
        ]);
    }
}
