<?php

namespace Src\Auth\Application;

class InvitacionValidadaQuery
{
    public function __construct(
        public string $token
    ) {
    }
}
