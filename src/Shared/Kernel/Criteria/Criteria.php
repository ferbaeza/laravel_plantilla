<?php

namespace Src\Shared\Kernel\Criteria;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class Criteria
{
    // private $select = null;
    // private $limit = null;
    // private $offset = null;
    // private $groupBy = null;
    private $options = [];
    public array $with = [];
    private $orderBy = [];

    public function __get($name)
    {
        return $this->$name;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getRelations()
    {
        return $this->with;
    }

    public function find(...$id)
    {
        $this->options[] = [
            'method' => 'find',
            'params' => $id
        ];
        return $this;
    }
    public function findById(...$id)
    {
        $this->find($id);
    }
    public function id(...$id)
    {
        $this->find($id);
    }

    public function select(...$params)
    {
        $this->options[] = [
            'method' => 'where',
            'params' => $params
        ];
        return $this;
    }

    public function where(...$params)
    {
        $this->options[] = [
            'method' => 'where',
            'params' => $params
        ];
        return $this;
    }

    public function firstWhere(...$params)
    {
        $this->options[] = [
            'method' => 'firstWhere',
            'params' => $params
        ];
        return $this;
    }

    public function orWhere(...$params)
    {
        $this->options[] = [
            'method' => 'orWhere',
            'params' => $params
        ];
        return $this;
    }

    public function orWhereNot(...$params)
    {
        $this->options[] = [
            'method' => 'orWhereNot',
            'params' => $params
        ];
        return $this;
    }

    public function latest(...$params)
    {
        $this->options[] = [
            'method' => 'latest',
            'params' => $params
        ];
        return $this;
    }

    public function oldest(...$params)
    {
        $this->options[] = [
            'method' => 'oldest',
            'params' => $params
        ];
        return $this;
    }

    public function get(...$params)
    {
        $this->options[] = [
            'method' => 'get',
            'params' => $params
        ];
        return $this;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->orderBy[] = [$column, $direction];
        return $this;
    }

    public function with(...$params)
    {
        if (is_array($params[0])) {
            // dump('es array');
            $this->with = array_merge($this->with, $params[0]);
        } else {
            // dump('no es array');
            $this->with = array_merge($this->with, $params);
        }
        return $this;
    }
}
