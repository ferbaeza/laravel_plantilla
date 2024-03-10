<?php

namespace Src\Auth\Domain\Interfaces;

use Src\Auth\Domain\DTO\UrlRegistroDto;
use Src\Auth\Application\InvitacionValidadaQuery;
use Src\Auth\Application\RegistrarUsuarioCommand;
use Src\Auth\Domain\DTO\InvitacionConfirmadadDto;

interface RegisterInterfaceRepository
{
    public function count(RegistrarUsuarioCommand $command): bool;
    public function registrarUsuario(RegistrarUsuarioCommand $command): UrlRegistroDto;
    public function invitacionValidada(InvitacionValidadaQuery $query): InvitacionConfirmadadDto;
}
