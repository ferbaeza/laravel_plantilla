<?php

namespace Src\Auth\Domain\Aggregate;

use Illuminate\Support\Str;
use Src\Auth\Application\CrearUsuarioCommand;
use Illuminate\Contracts\Auth\Authenticatable;
use Src\Shared\Dao\User\Domain\Entity\UsuarioRegistrado;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\ValueObjects\Primitivos\Strings\StringValueObject;

class UsuarioLogeadoAggregate
{
    public function __construct(
        public readonly Authenticatable $user,
        public readonly StringValueObject $token
    ) {
    }

    public static function fromRepo(Authenticatable $user, string $token): self
    {
        return new self($user, new StringValueObject($token));
    }

    public function toArray(): array
    {
        return [
            'id' => $this->user,
            'nombre' => $this->token
        ];
    }
}
