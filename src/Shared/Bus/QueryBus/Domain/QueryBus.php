<?php

namespace Src\Shared\Bus\QueryBus\Domain;

use Illuminate\Container\Container;
use Src\Shared\Bus\Shared\Domain\Interfaces\BusInterface;

class QueryBus implements BusInterface
{
    protected array $middlewares = [];

    public function __construct(
        ...$middlewares
    ) {
        $this->middlewares = $middlewares;
    }

    public function handle($query)
    {
        $middleware = current($this->middlewares);
        next($this->middlewares);
        $result = $this->execute($query, $middleware);
        return $result;
    }

    public function execute($query, $middleware)
    {
        if ($middleware) {
            $middleware = app()->make($middleware);
            $response = $middleware->process($query, $this);
            return $response;
        }
    }
}
