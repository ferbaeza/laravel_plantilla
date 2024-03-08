<?php

namespace Src\Custom\Application;

use Src\Custom\Application\WelcomeCommand;

class WelcomeCommandHandler
{

    public function run(WelcomeCommand $command)
    {
        $routes = app()->router->routes;
        dd($routes, 'handler');
    }
}
