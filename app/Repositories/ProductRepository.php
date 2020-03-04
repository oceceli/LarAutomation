<?php

namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Product;

class ProductRepository extends CrudRepository implements ProductContract
{

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

}