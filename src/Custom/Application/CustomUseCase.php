<?php

namespace Src\Custom\Application;

class CustomUseCase
{
    public function __construct(
        public readonly string $name,
    )
        {
    }
}
