<?php

namespace Src\Shared\Criteria\Builder;

use Src\Shared\Criteria\Criteria;
use Illuminate\Database\Eloquent\Model;

class CriteriaBuilder
{
    public function __construct(
        protected Model $model,
    ) {
    }

    public function apply(Criteria $criteria)
    {
        $result = $this->model->with($criteria->getRelations());

        foreach ($criteria->getOptions() as $options) {
            // $metodo = $options['method'];
            // $params = $options['params'];
        }
        $response = call_user_func_array([$result, $options['method']], $options['params']);
        // dd($response);
        return $response;
    }
}
