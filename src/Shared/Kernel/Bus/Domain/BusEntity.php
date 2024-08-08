<?php

namespace Src\Shared\Kernel\Bus\Domain;

use Illuminate\Container\Container;

class BusEntity
{
    protected $middlewares = [];

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
            $middleware = Container::getInstance()->make($middleware);
            $response = $middleware->process($query, $this);
            return $response;
        }
    }
}
