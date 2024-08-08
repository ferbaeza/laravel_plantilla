<?php

namespace Src\Shared\Kernel\Laravel\Repository;

use Src\Shared\Kernel\Criteria\Criteria;
use Src\Shared\Kernel\Criteria\Builder\CriteriaBuilder;


abstract class BaseRepository
{
    protected string $modelClass;
    protected $model = null;
    protected $with = false;

    public function __construct()
    {
        $this->model = new $this->modelClass();
    }

    public function getModelEntity(Criteria $criteria)
    {
        $response = $this->applyCriteria($criteria);
        return $response->first();
    }

    public function getModelCollection(Criteria $criteria)
    {
        $response = $this->applyCriteria($criteria);
        return $response->get();
    }

    private function applyCriteria(Criteria $criteria)
    {
        if ($this->with) {
            $criteria->with($this->with);
        }
        $builder = new CriteriaBuilder($this->model);
        $response = $builder->apply($criteria);
        return $response;
    }
}