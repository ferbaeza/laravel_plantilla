<?php

namespace Src\Shared\Repository;

abstract class BaseRepository
{
    protected string $modelClass;
    protected $model = null;

    public function __construct()
    {
        $this->model = new $this->modelClass();
    }
}
