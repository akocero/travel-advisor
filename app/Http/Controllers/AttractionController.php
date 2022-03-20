<?php

namespace App\Http\Controllers;

use App\Place;
use App\TOA;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index($id)
    {
        // dd($id);
        $attractions = Place::where('type', 'attraction')->get();
        $type_of_attraction = TOA::findOrFail($id);

        // dd($type_of_attraction);
        return view('attractions.index', compact('attractions', 'id', 'type_of_attraction'));
    }

    public function show(Place $place)
    {
        return view('attractions.show', compact('place'));
    }
}
