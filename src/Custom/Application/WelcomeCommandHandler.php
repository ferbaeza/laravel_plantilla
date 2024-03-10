<?php

namespace Src\Custom\Application;

use Src\Custom\Domain\Entity\RouteEntity;
use Src\Custom\Application\WelcomeCommand;
use Src\Custom\Domain\Collection\RouteCollection;

class WelcomeCommandHandler
{

    public function run(WelcomeCommand $command)
    {
        $routes = app()->router;
        $routes = [];
        $routeCollection = new RouteCollection();
        foreach (app()->router->getRoutes() as $route) {
            $uri = explode('/', $route->uri);
            if ($uri[0] == ('_ignition') || $uri[0] == 'sanctum') {
                continue;
            }
            $routeCollection->add(new RouteEntity($route->uri));
            $routes[] = new RouteEntity($route->uri);
        }
        dd($routeCollection);
        return $routeCollection->getItems();
    }
}
