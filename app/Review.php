<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $guarded = [];


    public function store()
    {

        // dd(request()->all());
        $review = Review::create($this->validatedData());

        return redirect()->back();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
