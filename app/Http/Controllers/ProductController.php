<?php

namespace App\Http\Controllers;

use App\Contracts\ProductContract;

class ProductController extends Controller
{
    public function __construct(ProductContract $repository)
    {
        $this->repository = $repository;
    }
}
