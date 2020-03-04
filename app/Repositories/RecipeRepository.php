<?php

namespace App\Repositories;

use App\Contracts\RecipeContract;
use App\Recipe;

class RecipeRepository extends CrudRepository implements RecipeContract
{
    public function __construct(Recipe $model)
    {
        $this->model = $model;
    }
}