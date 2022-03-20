<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //

    public function store()
    {
        // dd(request()->all());
        // $review = Review::create($this->validatedData());
        auth()->user()->reviews()->create($this->validatedData());
        return redirect()->back();

        // dd(auth()->user());

        // dd(request()->all());
    }

    protected function validatedData()
    {
        return request()->validate([
            'place_id' => '',
            'body' => 'required',
        ]);
    }
}
