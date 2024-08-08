<?php

namespace Src\Shared\Kernel\Criteria\Builder;

use Illuminate\Database\Eloquent\Model;
use Src\Shared\Kernel\Criteria\Criteria;

class CriteriaBuilder
{
    public function __construct(
        protected Model $model,
    ) {
    }

    public function apply(Criteria $criteria)
    {
        if ($this->model->with) {
            $criteria->with($this->model->with);
        }
        $result = $this->model->with($criteria->with);

        if (count($criteria->getOptions())) {
            foreach ($criteria->getOptions() as $options) {
                $metodo = $options['method'];
                $params = $options['params'];
            }
            /** @phpstan-ignore-next-line */
            $result = call_user_func_array([$result, $metodo], $params);
        }

        if (count($criteria->orderBy)) {
            foreach ($criteria->orderBy as $orderBy) {
                $result = call_user_func_array([$result, 'orderBy'], $orderBy);
            }
        }

        return $result;
    }
}
