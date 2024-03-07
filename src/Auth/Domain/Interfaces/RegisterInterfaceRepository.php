<?php

namespace Src\Auth\Domain\Interfaces;

use Src\Auth\Domain\DTO\UrlRegistroDto;
use Src\Auth\Application\CrearUsuarioCommand;
use Src\Auth\Application\InvitacionValidadaQuery;
use Src\Auth\Application\RegistrarUsuarioCommand;
use Src\Auth\Domain\DTO\InvitacionConfirmadadDto;
use Src\Shared\Dao\User\Domain\Entity\UsuarioRegistrado;

interface RegisterInterfaceRepository
{
    public function registrarUsuario(RegistrarUsuarioCommand $command): UrlRegistroDto;
    public function invitacionValidada(InvitacionValidadaQuery $query): InvitacionConfirmadadDto;
}
