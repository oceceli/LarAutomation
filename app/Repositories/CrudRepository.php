<?php

namespace App\Repositories;
use App\Contracts\CrudInterface;

abstract class CrudRepository implements CrudInterface
{

    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function store(array $array)
    {
        return $this->model->create($array);
    }

    public function showById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $array, int $id)
    {
        if ($this->showById($id)->update($array)) {
            return response($this->showById($id), 200);
        }
    }

    public function delete(int $id)
    {
        if($this->showById($id)->delete())
            return response('', 204);
    }

    public static function getModel()
    {
        return $this->model;
    }
}