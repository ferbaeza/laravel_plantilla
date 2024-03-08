<?php

declare(strict_types=1);

namespace Src\Shared\Laravel\Exceptions\Base;

class ColorConstantsExceptions
{
    public const RED = "\033[1;31m";
    public const GREENLIGHT = "\033[1;32m";
    public const GREEN = "\033[0;32m";
    public const YELLOW = "\033[1;33m";
    public const BLUE = "\033[1;34m";
    public const NOCOLOR = "\033[0m";
}
