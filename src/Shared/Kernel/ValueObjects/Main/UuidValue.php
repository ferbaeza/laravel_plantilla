<?php

namespace Src\Shared\Kernel\ValueObjects\Main;

use Ramsey\Uuid\Uuid;
use Src\Shared\Kernel\ValueObjects\Interfaces\Value;
use Src\Shared\Kernel\Exceptions\ValueObjects\UuidException;
use Src\Shared\Kernel\ValueObjects\Base\CustomBaseValueObject;

class UuidValue extends CustomBaseValueObject implements Value
{
    public function __construct(
        public readonly string $uuid
    ) {
        if (!is_string($uuid)) {
            throw UuidException::drop($uuid);
        }

        if (!isUuid($uuid)) {
            throw UuidException::drop($uuid);
        }
    }

    public static function create(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function value(): mixed
    {
        return $this->uuid;
    }

}
