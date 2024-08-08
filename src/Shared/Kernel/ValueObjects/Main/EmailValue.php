<?php

namespace Src\Shared\Kernel\ValueObjects\Main;

use Src\Shared\Kernel\Utils\Primitivos\StringUtils;
use Src\Shared\Kernel\ValueObjects\Interfaces\Value;
use Src\Shared\Kernel\ValueObjects\Base\CustomBaseValueObject;
use Src\Shared\Kernel\Exceptions\ValueObjects\EmailInvalidoException;


class EmailValue extends CustomBaseValueObject implements Value
{
    public function __construct(
        private string $email
    ) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw EmailInvalidoException::drop();
        }

        $this->email = StringUtils::minusculas($email);
    }

    public function value(): string
    {
        return $this->email;
    }
}
