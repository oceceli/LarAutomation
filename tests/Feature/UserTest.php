<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends IndexTest
{
    protected $uri = "/api/users/";
    protected $model = "App\User";
    protected $contract = 'App\Contracts\UserContract';



    

}
