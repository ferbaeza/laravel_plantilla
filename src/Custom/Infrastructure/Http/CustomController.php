<?php

namespace Src\Custom\Infrastructure\Http;


use Src\Shared\Utils\Http\ApiResponse;
use Src\Custom\Application\CustomUseCaseCommand;
use Src\Custom\Application\CustomUseCaseCommandHandler;

class CustomController
{
    public function __construct(
        protected CustomUseCaseCommandHandler $handler,
    )
    {
    }

    public function index()
    {
        return view('custom');
    }

    public function hello(string $name)
    {
        $command = new CustomUseCaseCommand($name, null);
        $data = $this->handler->run($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function body(CustomRequest $request)
    {
        $name = $request['nombre'];
        $edad = $request['edad'];
        $command = new CustomUseCaseCommand($name, $edad);
        $data = $this->handler->run($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

}
