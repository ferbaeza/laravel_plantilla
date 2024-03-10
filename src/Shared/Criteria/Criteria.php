<?php

namespace Src\Shared\Criteria;

class Criteria
{

    private $select = null;
    private $where = [];
    private $orderBy = [];
    private $limit = null;
    private $offset = null;
    private $groipBy = null;
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

    public function select(...$params)  // ...$fields is a variadic parameter
    {
        $this->options[] = [
            'method' => 'where',
            'params' => $params
        ];
        return $this;
    }

    public function where(...$params)  // ...$params is a variadic parameter
    {
        $this->options[] = [
            'method' => 'where',
            'params' => $params
        ];
        return $this;
    }
}
