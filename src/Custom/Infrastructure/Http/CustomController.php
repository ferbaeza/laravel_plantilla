<?php

namespace Src\Custom\Infrastructure\Http;

use Illuminate\Console\Command;
use Src\Shared\Utils\Http\ApiResponse;
use Src\Shared\Controller\BaseController;
use Src\Custom\Application\CustomUseCaseCommand;
use Src\Custom\Application\CustomUseCaseCommandHandler;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;

class CustomController extends BaseController
{
    // public function __construct(
    //     protected CustomUseCaseCommandHandler $handler,
    // ) {
    // }

    public function index()
    {
        return view('custom');
    }

    public function hello(string $name)
    {
        $command = new CustomUseCaseCommand($name, null);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function body(CustomRequest $request)
    {
        $name = $request['nombre'];
        $edad = $request['edad'];
        $command = new CustomUseCaseCommand($name, $edad);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
