<?php

namespace App\Providers;

use App\Contracts\ProductContract;
use App\Contracts\RecipeContract;
use App\Contracts\UnitContract;
use App\Contracts\UnitConversionContract;
use App\Contracts\UserContract;
use App\Repositories\ProductRepository;
use App\Repositories\RecipeRepository;
use App\Repositories\UnitConversionRepository;
use App\Repositories\UnitRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UnitContract::class, UnitRepository::class);
        $this->app->bind(ProductContract::class, ProductRepository::class);
        $this->app->bind(UnitConversionContract::class, UnitConversionRepository::class);
        $this->app->bind(RecipeContract::class, RecipeRepository::class);
        $this->app->bind(UserContract::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
