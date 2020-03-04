<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

abstract class IndexTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * This will be our instantiated model through app()->make()
     * It's based on given string
     * The string coming from extenders of this class
     *
     * @var object
     */
    protected $repository;

    
   


    /*************************************************************************************************
     * ***********************************************************************************************
     * This abstract class making CRUD tests easy. But, there are some rules:
     * The extenders must set three properties named $uri, $model and $contract
     * Those two will be strings
     * You have to have a factory for each models
     * These classes extends this class so, you can add another tests inside of it.
     * **********************************************************************************************
     ************************************************************************************************/



    /**
     * setUp function basically sets properties' values
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->CheckIfTestReady(); // execute needed actions
        
    }
    
    
    /**
     * Notify testing developers if properties aren't exists or empty.
     */
    private function CheckIfTestReady()
    {
        if( ! isset($this->model)){
            dd('Property "$model" must be declared as the model\'s path!');
        }
        if( ! isset($this->uri)){
            dd('Property "$uri" must be set and must contain a string of resource uri!');
        }
        if( ! isset($this->contract)){
            dd('Property $contract of repository must be declared!');
        }
        $this->uri = $this->UriResolver(trim($this->uri));
        $this->repository = app()->make(trim($this->contract));
    }
    

    /**
     * Just in case if extender class didn't set uri ends with a slash
     */
    private function UriResolver(String $uri)
    {
        if(preg_match("/\/$/", $uri))
            return $uri;
        return $uri."/";
    }
    
    /**
     * Look at the model class if getHiddenAttributes() function exists
     * if exists, return object with makeVisible.
     * if not exists return object itself
     *
     * @param Object $object
     * @return object
     */
    private function checkHiddenAttributes($object)
    {
        if(method_exists($this->model, 'getHiddenAttributes')) {
            if(null !== ($this->model::getHiddenAttributes())) {
                return $object->makeVisible($this->model::getHiddenAttributes());
            } else {
                dd("{$this->model} model'ında getHiddenAttributes() fonksiyonu hiçbir değer döndürmedi!");
            }
        }
    }



    /**************** TESTS ********************************************************/

    /**
     * Get all objects
     * @test
     */
    public function all_objects_can_be_retrieved()
    {
        $object = factory($this->model, 5)->create();
        $response = $this->get($this->uri)->assertOk();
        $this->assertCount(5, $this->repository->all());
    }

    /**
     * Get a specific object
     * @test
     */
    public function an_object_can_be_retrieved()
    {
        $object = factory($this->model)->create();
        $response = $this->get($this->uri.$object->id)->assertOk();
        $response->assertJson($object->toArray());
    }
    

    /**
     * Create an object
     * The trick here is creating data with factory, delete it and create it again through router path
     * 
     * 
     * @test
     */
    public function an_object_can_be_created()
    { 

        $object = factory($this->model)->make(); // örnek veri
        $this->checkHiddenAttributes($object);
        
        $this->assertCount(0, $this->repository->all());
        $response = $this->post($this->uri, $object->toArray()); // örnek veriyi post edelim
        $this->assertCount(1, $this->repository->all());
    }

    /**
     * Update an object
     * @test
     */
    public function an_object_can_be_updated()
    {
        $toUpdate = factory($this->model)->create();
        $updateData = factory($this->model)->make();
        $this->checkHiddenAttributes($updateData);

        $response = $this->patch($this->uri.$toUpdate->id, $updateData->toArray())->assertOk();

        $toUpdate = $toUpdate->fresh();
        $response->assertJson($toUpdate->toArray());    
    }

    /**
     * Delete an object
     * @test
     */
    public function an_object_can_be_deleted()
    {
        $object = factory($this->model)->create();
        $this->delete($this->uri.$object->id);
        $this->assertCount(0, $this->repository->all());
    }

}