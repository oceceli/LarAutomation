<?php

namespace Tests\Unit\Facades;

use Illuminate\Support\Facades\Facade;

class RelationTest extends Facade
{

    //AppServiceProvider
    protected static function getFacadeAccessor()
    {
        return 'relationTest';
    }

}