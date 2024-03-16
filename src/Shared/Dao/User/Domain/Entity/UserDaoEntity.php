<?php

namespace Src\Shared\Dao\User\Domain\Entity;

use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Shared\ValueObjects\Primitivos\Strings\StringValueObject;

class UserDaoEntity implements \JsonSerializable
{
    public function __construct(
        public readonly UuidValue $id,
        public readonly StringValueObject $nombre,
        public readonly StringValueObject $email,
    ) {
    }

    public static function create(string $id, string $nombre, string $email): UserDaoEntity
    {
        return new UserDaoEntity(
            new UuidValue($id),
            new StringValueObject($nombre),
            new StringValueObject($email)
        );
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id->value(),
            'nombre' => $this->nombre->value(),
            'email' => $this->email->value()
        ];
    }
}
