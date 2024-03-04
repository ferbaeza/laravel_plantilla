<?php

namespace Src\Home\Infrastructure\Web;

use Illuminate\Http\Request;
use Src\Home\Application\HomeCommand;
use Src\Home\Application\HomeCommandHandler;
use Src\Shared\Utils\Http\ApiResponse;

class HomeController
{
    public function __construct(
        protected HomeCommandHandler $handler,
    ) {
    }

    public function hello(string $name)
    {
        $command = new HomeCommand($name);
        $data = $this->handler->run($command);
        return ApiResponse::json(content : $data, status : ApiResponse::ESTADO_200_OK);
    }

    public function bye()
    {
        $data = ['message' => 'Bye Bye World!'];
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
