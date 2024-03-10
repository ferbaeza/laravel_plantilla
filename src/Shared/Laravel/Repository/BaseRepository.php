<?php

namespace Src\Shared\Laravel\Repository;

use Src\Shared\Criteria\Criteria;
use Src\Shared\Criteria\Builder\CriteriaBuilder;

abstract class BaseRepository
{
    protected string $modelClass;
    protected $model = null;

    public function __construct()
    {
        $this->model = new $this->modelClass();
    }

    public function getModelEntity(Criteria $criteria)
    {
        $builder = new CriteriaBuilder($this->model);
        $response = $builder->apply($criteria);
        return $response->first();
    }

    public function getModelCollection(Criteria $criteria)
    {
        $builder = new CriteriaBuilder($this->model);
        $response = $builder->apply($criteria);
        return $response->get();
    }
}
