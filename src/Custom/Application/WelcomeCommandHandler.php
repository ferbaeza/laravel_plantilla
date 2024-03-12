<?php

namespace Src\Custom\Application;

use stdClass;
use Src\Custom\Domain\Entity\RouteEntity;
use Src\Custom\Application\WelcomeCommand;
use Src\Custom\Domain\Collection\RouteCollection;
use Src\Shared\Eventos\Custom\CustomExampleEvent;
use Src\Shared\Bus\Shared\Domain\Entity\EventDispatcher;

/**
 * @SuppressWarnings(PHPMD)
 */
class WelcomeCommandHandler
{
    public function run(WelcomeCommand $command)
    {
        $routeCollection = new RouteCollection();
        
        if($command->id) {
            $routeCollection->add(new RouteEntity($command->id, 'EventId'));
            EventDispatcher::publish(new CustomExampleEvent($command->id));
        }
        
        foreach (app()->router->getRoutes() as $route) {
            $uri = explode('/', $route->uri);
            if ($uri[0] == ('_ignition') || $uri[0] == 'sanctum') {
                continue;
            }
            $routeCollection->add(new RouteEntity($route->uri, $route->methods[0]));
        }
        return $routeCollection->getByMethod();
    }
}
