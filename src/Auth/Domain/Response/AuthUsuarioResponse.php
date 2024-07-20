<?php

namespace Src\Auth\Domain\Response;

use Src\Shared\Contrats\Response;
use Src\Shared\DAO\Usuario\Domain\DTO\UsuarioDTO;

class AuthUsuarioResponse implements Response
{
    public function __construct(
        public readonly UsuarioDTO $response,
    )
        {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->response->id->value(),
            'usuario' => $this->response->usuario,
            'name' => $this->response->name,
            'apellidoPrimero' => $this->response->apellidoPrimero,
            'apellidoSegundo' => $this->response->apellidoSegundo,
            'email' => $this->response->email,
        ];
    }

}
