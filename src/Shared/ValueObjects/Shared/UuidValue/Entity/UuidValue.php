<?php

namespace Src\Shared\ValueObjects\Shared\UuidValue\Entity;

use Illuminate\Support\Str;
use Src\Shared\ValueObjects\Base\Contracts\CustomBaseValueObject;
use Src\Shared\ValueObjects\Shared\UuidValue\Exception\UuidInvalidoException;

/**
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class UuidValue extends CustomBaseValueObject
{
    public function __construct(private string $id)
    {
        if (! str($id)->isUuid()) {
            throw UuidInvalidoException::porUuid($id);
        }
    }

    public static function create(): self
    {
        return new self(Str::uuid());
    }

    public static function id(): string
    {
        return self::create()->value();
    }

    public function __toString()
    {
        return $this->id;
    }

    public function uuid(): string
    {
        return $this->id;
    }

    public function value(): mixed
    {
        return $this->id;
    }

    public function jsonSerialize(): mixed
    {
        return $this->id;
    }
}
