<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    protected $guarded = [];


    public function getTypeOfAttractionsAttribute($value)
    {
        return explode(",", $value);
    }

    public function setTypeOfAttractionsAttribute($value)
    {
        $this->attributes['type_of_attractions'] = implode(",", $value);
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
