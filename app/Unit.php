<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = [];

    static public function ValidateData() {
        return [
            'name' => 'required',
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function UnitConversions()
    {
        return $this->hasMany(UnitConversion::class);
    }
}
