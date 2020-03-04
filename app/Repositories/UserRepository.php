<?php

namespace App\Repositories;

use App\Contracts\UserContract;
use App\User;

class UserRepository extends CrudRepository implements UserContract
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }


}