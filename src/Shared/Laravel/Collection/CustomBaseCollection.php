<?php

namespace Src\Shared\Laravel\Collection;

use Illuminate\Support\Collection;

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

    public function add($entity)
    {
        if (!is_a($entity, $this->type)) {
            throw new \Exception("You can only add items of type {$this->type}");
        }
        $hash = spl_object_hash($entity);
        $hashId = spl_object_id($entity);

        $this->addedItems[$hash] = $entity;
        $this->itemsById[$hashId] = $entity;
        $this->data->add((object)$entity);
    }
}
