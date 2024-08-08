<?php

namespace Src\Shared\Kernel\Collection;

use InvalidArgumentException;
use Illuminate\Support\Collection;

class BaseCollection extends Collection
{
    protected $type;
    protected array $hashedItems = [];
    protected array $addedItems = [];
    protected array $ignoredItems = [];
    protected array $deletedItems = [];

    public function add($entity)
    {
        $this->checkItemType($entity);

        $this->items[] = (object)$entity;
        $this->addedItems[spl_object_id($entity)] = (object)$entity;
        $this->hashedItems[spl_object_hash($entity)] = (object)$entity;
        return $this;
    }

    public function checkItemType($item)
    {
        if (!$this->type) {
            throw new InvalidArgumentException('protected $type debe ser definido en la nueva collection.');
        }

        if (!is_a($item, $this->type)) {
            throw new InvalidArgumentException('La entidad debe ser de tipo ' . $this->type);
        }

        if (!($item instanceof $this->type)) {
            throw new InvalidArgumentException('La entidad debe ser de tipo ' . $this->type);
        }
    }

    public function ignore($item)
    {
        $this->checkItemType($item);
        $hashId = spl_object_id($item);
        $this->ignoredItems[$hashId] = (object)$item;
        unset($this->addedItems[$hashId]);
        return $this;
    }

    public function delete($item)
    {
        $this->checkItemType($item);
        $hashId = spl_object_id($item);
        $this->deletedItems[$hashId] = (object)$item;
        unset($this->addedItems[$hashId]);
        unset($this->ignoredItems[$hashId]);

        return $this;
    }

    public function getAddedItems()
    {
        return $this->addedItems;
    }

    public function getHashedItems()
    {
        return $this->hashedItems;
    }

    public function getIgnoredItems()
    {
        return $this->ignoredItems;
    }

    public function getDeletedItems()
    {
        return $this->deletedItems;
    }

}
