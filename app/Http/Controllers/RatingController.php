<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store()
    {

        auth()->user()->rating()->create($this->validatedData());
        return redirect()->back();
    }

    protected function validatedData()
    {
        return request()->validate([
            'rating' => 'required',
        ]);
    }
}
