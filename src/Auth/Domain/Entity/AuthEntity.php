<?php

namespace Src\Auth\Domain\Entity;

use Illuminate\Support\Str;
use Src\Auth\Application\AuthCommand;
use Src\Shared\ValueObjects\Primitivos\Strings\StringValueObject;

class AuthEntity
{
    public function __construct(
        public readonly string $id,
        public readonly StringValueObject $nombre
    ) {
    }

    public static function fromCommand(AuthCommand $command, string $string): self
    {
        $texto = sprintf($string, $command->nombre);
        return new self(Str::uuid(), new StringValueObject($texto));
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre
        ];
    }
}
