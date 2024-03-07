<?php

namespace Src\Shared\Bus\CommandBus\Domain;

use Src\Shared\Bus\Shared\Domain\Interfaces\BusInterface;

class CommandBus implements BusInterface
{
    protected $middlewares = [];
    public function __construct(
        ...$middlewares
    ) {
        $this->middlewares = $middlewares;
    }

    public function handle($command)
    {
        $middleware = current($this->middlewares);
        dump($middleware);
        next($this->middlewares);
        $result = $this->execute($command, $middleware);
        return $result;
    }

    public function execute($command, $middleware)
    {
        if ($middleware) {
            $middleware = app()->make($middleware);
            $response = $middleware->process($command, $this);
            return $response;
        }
    }
}
