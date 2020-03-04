<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];



    public function Unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function UnitConversions()
    {
        return $this->hasMany(UnitConversion::class);
    }


}

