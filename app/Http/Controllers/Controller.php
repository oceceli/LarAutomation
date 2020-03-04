<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Unit;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $repository;

    public function index()
    {
        return $this->repository->all();
    }

    public function store()
    {
        return $this->repository->store(request()->all());
    }

    public function update($id)
    {
        return $this->repository->update(request()->all(), $id);
    }

    public function show($unit)
    {
        return $this->repository->showById($unit);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
