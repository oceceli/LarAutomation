<?php

namespace App\Http\Controllers;

use App\Contracts\RecipeContract;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function __construct(RecipeContract $repository)
    {
        $this->repository = $repository;
    }   
}
