<?php

namespace Src\Custom\Domain\Collection;

use Src\Custom\Domain\Entity\RouteEntity;
use Src\Shared\Laravel\Collection\BaseCollection;

class RouteCollection extends BaseCollection
{
    protected $type = RouteEntity::class;
    protected $name = 'RouteCollection';

    public function getByMethod()
    {
        $data = [];
        foreach ($this->getAddedItems() as $value) {
            if (!isset($data[$value->metodo])) {
                $data[$value->metodo] = [$value->nombre];
                continue;
            }
            array_push($data[$value->metodo], $value->nombre);
        }
        return $data;
    }
}
