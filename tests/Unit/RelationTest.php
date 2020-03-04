<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RelationTest extends TestCase
{
    use RefreshDatabase;


    
    /**
     * Check if parent class has many child class
     */
    public function hasMany($parent, $child)
    {
        $parentSnake = $this->toSnakeCase($parent); // parent snake_case if applicable

        // create parent object via factory
        $parentObject = factory($parent)->create();

        // create children with parent's relational id. Like parent_id
        $childObject = factory($child, 5)->create([$parentSnake.'_id' => $parentObject->id]);

        // in the parent model, relation's function has been set with child class' name plus an 's' 
        // so the $relation variable will be referencing that function
        $relation = $this->getRelation($child, 's');

        // check relativity
        $this->assertTrue($parentObject->$relation->contains($childObject->first()));
        $this->assertCount(5, $parentObject->$relation);
        $this->assertInstanceOf(Collection::class, $parentObject->$relation);
    }


    // Check if child class belongs to parent class
    public function belongsTo($parent, $child)
    {
        $parentSnake = $this->toSnakeCase($parent);

        $parentObject = factory($parent)->create();
        $childObject = factory($child)->create([$parentSnake."_id" => $parentObject->id]);

        // in the parent model, relation's function has been set with parent class' name
        $relation = $this->getRelation($parent);

        $this->assertInstanceOf($parent, $childObject->$relation);
        $this->assertEquals($parentObject->toArray(), $childObject->$relation->toArray());
    }


    
    private function getRelation($relation, $suffix = '')
    {
        return $this->getClassName($relation).$suffix;
    }




    // bu private fonksiyonları utility altına koyup facade yapabilirim
    private function toSnakeCase(String $string) : string
    {
        $string = $this->getClassName($string);
        return strtolower(trim(preg_replace('/[A-Z]/', '_\0', $string),'_'));
    }

    private function getClassName($string) : string
    {
        return $string = preg_replace('/.*\\\/', '', $string);
    }

}