<?php

namespace Tests\src\Custom\Infrastructure;

use Tests\TestCase;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;

class CustomErrorApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getUsusarioByEmailApiTest()
    {
        $response = $this->get(route('custom.error'));
        $response->assertStatus(401);
    }
}
