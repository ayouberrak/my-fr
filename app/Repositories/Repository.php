<?php

namespace App\Repositories;

use App\Models\Model;

abstract class Repository
{
    protected Model $model;

    // Common repository methods
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

    public function update($id, array $data)
    {
        return $this->model::update($id, $data);
    }

    public function delete($id)
    {
        return $this->model::delete($id);
    }

    public function findBy(string $column, $value)
    {
        return $this->model::findBy($column, $value);
    }

    public function findByEmail($email)
    {
        return $this->findBy('email', $email);
    }
}
