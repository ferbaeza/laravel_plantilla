<?php

namespace Src\Shared\Laravel\Collection;

use Illuminate\Support\Collection;
use Src\Shared\Laravel\Exceptions\CustomExceptions\CustomCollectionExceptions;

abstract class CustomBaseCollection
{
    protected $type;
    protected $name;
    public string $collectionClass;
    public Collection $data;

    protected array $addedItems = [];
    protected array $ignoredItems = [];
    protected array $deletedItems = [];

    public function __construct()
    {
        $this->data = new Collection();
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return  call_user_func_array([$this, $name], $arguments);
        }

        $value = call_user_func_array([$this->data, $name], $arguments);
        return $value;
    }

    public function getAddedItems()
    {
        return $this->addedItems;
    }

    public function getIgnoredItems()
    {
        return $this->ignoredItems;
    }

    public function add($entity)
    {
        if (!is_a($entity, $this->type)) {
            throw CustomCollectionExceptions::drop("{$this->type}");
        }
        // $hash = spl_object_hash($entity);
        $hashId = spl_object_id($entity);

        $this->addedItems[$hashId] = $entity;
        $this->data->add((object)$entity);
    }

    public function ignore($entity)
    {
        $hashId = spl_object_id($entity);
        unset($this->addedItems[$hashId]);

        $this->ignoredItems[$hashId] = $entity;
    }

    public function delete($entity)
    {
        $hashId = spl_object_id($entity);
        unset($this->ignoredItems[$hashId]);
        unset($this->addedItems[$hashId]);

        $this->deletedItems[$hashId] = $entity;
        $this->data->forget($hashId);
    }
}
