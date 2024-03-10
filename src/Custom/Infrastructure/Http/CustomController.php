<?php

namespace Src\Custom\Infrastructure\Http;

use Src\Shared\Utils\Http\ApiResponse;
use Src\Custom\Application\WelcomeCommand;
use Src\Custom\Application\CustomUseCaseCommand;
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
        return view('errors.401');
    }

    public function error()
    {
        return $this->error401();
    }

    public function getUsusarioByEmail(UsuarioEmailRequest $request)
    {
        $email = $request->email();
        $command = new CustomUseCaseCommand($email);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function body(UsuarioEmailRequest $request)
    {
        $email = $request['email'];
        $command = new CustomUseCaseCommand($email);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function welcome()
    {
        $command = new WelcomeCommand();
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
