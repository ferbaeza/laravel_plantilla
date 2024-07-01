<?php

namespace Src\Custom\Infrastructure\Http;

use Src\Shared\Utils\Http\ApiResponse;
use Src\Custom\Application\WelcomeCommand;
use Src\Custom\Application\UsusarioByEmailCommand;
use Src\Shared\Laravel\Controller\BaseController;
use Src\Custom\Infrastructure\Http\Requests\CustomRequest;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Custom\Infrastructure\Http\Requests\UsuarioEmailRequest;

class CustomController extends BaseController
{
    public function index()
    {
        return view('custom');
    }

    public function error401()
    {
        return ApiResponse::json(content: [], status: ApiResponse::ESTADO_401_NO_AUTORIZADO);
    }

    public function error()
    {
        return ApiResponse::json(content: [], status: ApiResponse::ESTADO_401_NO_AUTORIZADO);
    }

    public function getUsusarioByEmail(string $email)
    {
        $command = new UsusarioByEmailCommand($email);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function body(UsuarioEmailRequest $request)
    {
        $email = $request['email'];
        $command = new UsusarioByEmailCommand($email);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function welcome()
    {
        $command = new WelcomeCommand(null);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
