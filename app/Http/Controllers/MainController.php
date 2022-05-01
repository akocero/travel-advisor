<?php

namespace App\Http\Controllers;

use App\Place;
use App\TOA;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        $places = Place::where('type', 'city')->get();
        $type_of_attractions = TOA::all();
        // $UserRating = auth()->user()->rating();
        // dd($UserRating);

        // dd($places);
        return view('main', compact('places', 'type_of_attractions'));
    }
}
