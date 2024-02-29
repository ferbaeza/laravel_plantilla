<?php

namespace Src\Custom\Infrastructure\Http;


use Src\Custom\Application\CustomUseCase;
use Src\Custom\Application\CustomUseCaseHandler;

class CustomController
{
    public function __construct(
        protected CustomUseCaseHandler $handler,
    )
    {
    }

    public function view()
    {
        return view('custom');
    }

    public function index(string $name)
    {
        $name = 'Fer';
        $command = new CustomUseCase($name);
        $data = $this->handler->run($command);
        return response()->json(['data' => $data]);
    }

}
