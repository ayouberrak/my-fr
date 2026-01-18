<?php

namespace App\Core;

abstract class Repository
{
    protected Model $model;

    // Common repository methods can go here
    public function all()
    {
        return $this->model::all();
    }
    
    public function find($id)
    {
        return $this->model::find($id);
    }
    
    public function create(array $data)
    {
        return $this->model::create($data);
    }
}
