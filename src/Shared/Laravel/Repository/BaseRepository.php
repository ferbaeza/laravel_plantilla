<?php

namespace Src\Shared\Laravel\Repository;

abstract class BaseRepository
{
    protected string $modelClass;
    protected $model = null;

    public function __construct()
    {
        $this->model = new $this->modelClass();
    }
}
