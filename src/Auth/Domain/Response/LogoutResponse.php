<?php

namespace Src\Auth\Domain\Response;

use Src\Shared\Contrats\Response;
use Src\Shared\Kernel\ValueObjects\Main\UuidValue;

class LogoutResponse implements Response
{
    public function __construct(
        public readonly UuidValue $id,
    )
        {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'message' => 'Usuario '. $this->id->value().' logout success',
        ];
    }

}
