<?php

namespace Src\Shared\Criteria;

class Criteria
{
    // private $select = null;
    // private $where = [];
    // private $orderBy = [];
    // private $limit = null;
    // private $offset = null;
    // private $groupBy = null;
    private $options = [];
    private $with = [];

    // public function __get($name)
    // {
    //     return $this->$name;
    // }

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
}
