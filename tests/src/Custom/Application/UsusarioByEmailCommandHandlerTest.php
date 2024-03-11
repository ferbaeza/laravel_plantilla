<?php

namespace Tests\src\Custom\Application;

use Tests\TestCase;
use Src\Custom\Application\UsusarioByEmailCommand;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Shared\Laravel\Exceptions\Usuario\UserNoExisteException;

class UsusarioByEmailCommandHandlerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }


    /** @test */
    public function deberia_lanzar_excep_al_no_existir_usuario()
    {
        $this->expectException(UserNoExisteException::class);

        $email = 'test@gmail.com';
        $command = new UsusarioByEmailCommand($email);
        CommandBusFacade::process($command);
    }
}
