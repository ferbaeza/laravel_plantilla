<?php

namespace Src\Auth\Application;

use Illuminate\Support\Facades\Auth;
use Src\Shared\Kernel\Command\Base\BaseCommand;


class AuthLogoutCommandHandler extends BaseCommand
{
    public function run(AuthLogoutCommand $command)
    {
        Auth::guard('api')->logout();
    }
}
