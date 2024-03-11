<?php

namespace Src\Shared\Laravel\Collection;

use Illuminate\Support\Collection;
use Src\Shared\Laravel\Exceptions\CustomExceptions\CustomCollectionExceptions;

abstract class CustomBaseCollection
{
    protected $type;
    protected $name;
    public Collection $data;
    protected array $itemsById = [];
    protected array $addedItems = [];

    public function __construct()
    {
        $this->data = new Collection();
    }


    public function getItems()
    {
        return $this->itemsById;
    }

    public function getAddedItems()
    {
        return $this->addedItems;
    }

    public function add($entity)
    {
        if (!is_a($entity, $this->type)) {
            throw CustomCollectionExceptions::drop("{$this->type}");
        }
        $hash = spl_object_hash($entity);
        $hashId = spl_object_id($entity);

        $this->addedItems[$hash] = $entity;
        $this->itemsById[$hashId] = $entity;
        $this->data->add((object)$entity);
    }
}
