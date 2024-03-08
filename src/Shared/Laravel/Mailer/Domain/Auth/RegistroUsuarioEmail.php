<?php

namespace Src\Shared\Laravel\Mailer\Domain\Auth;

use Src\Shared\Laravel\Mailer\Domain\CustomBaseEmail;

class RegistroUsuarioEmail extends CustomBaseEmail
{
    protected string $vista = 'email.email';
    public string $destinatario;
    public string $motivo = 'RegistroUsuarioEmail';


    public function __construct(
        public string $email,
        public string $url,
    ) {
        $this->destinatario = $email;
    }

    public static function create(string $email, string $url): self
    {
        return new self($email, $url);
    }
}
