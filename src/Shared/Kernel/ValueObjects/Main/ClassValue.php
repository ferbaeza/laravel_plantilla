<?php

namespace Src\Shared\Kernel\ValueObjects\Main;

use Ramsey\Uuid\Uuid;
use Src\Shared\Kernel\ValueObjects\Interfaces\Value;
use Src\Shared\Kernel\Exceptions\ValueObjects\UuidException;
use Src\Shared\Kernel\ValueObjects\Base\CustomBaseValueObject;

class ClassValue extends CustomBaseValueObject implements Value
{
    public function __construct(
        public readonly string $uuid7
    ) {
        if (!is_string($uuid7)) {
            throw UuidException::drop($uuid7);
        }

        if (!isUuid($uuid7)) {
            throw UuidException::drop($uuid7);
        }
    }

    public static function create(): self
    {
        return new self(Uuid::uuid7()->toString());
    }

    public function value(): mixed
    {
        return $this->uuid7;
    }

}
