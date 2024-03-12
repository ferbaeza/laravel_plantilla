<?php

namespace Src\Custom\Application;

class UsusarioByEmailCommand
{
    public function __construct(
        public readonly string $email,
    ) {
    }

    public function getEmail()
    {
        return $this->email;
    }
}
