<?php

namespace Src\Home\Domain\Entity;

use Illuminate\Support\Str;
use Src\Home\Application\HomeCommand;
use Src\Shared\ValueObjects\StringValueObject;

class HomeEntity
{
    public function __construct(
        public readonly string $id,
        public readonly StringValueObject $nombre
    )
        {
    }

    public static function fromCommand(HomeCommand $command , string $string): self
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
