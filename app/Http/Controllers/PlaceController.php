<?php

namespace App\Http\Controllers;

use App\Place;
use App\TOA;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = '';

        if (!is_null($request->search)) {
            $places = Place::where('name', 'like', '%' . request()->search . '%')
                ->orWhere('type', 'like', '%' . request()->search . '%')
                ->latest()
                ->paginate(10);
            $places->appends(['search' => $request->search]);

            $search = request()->search;
        } else {
            $places = Place::latest()->paginate(10);
        }
        // dd($places);
        return view('places.index', compact('places', 'search'));
    }


    public function create()
    {
        $cities = Place::where('type', 'city')->get();
        $toas = TOA::all();

        // $households = Household::all()->sortBy('family_name');
        return view('places.create', compact('cities', 'toas'));
    }


    public function store(Request $request)
    {
        // dd(request()->image);


        $place = Place::create($this->validatedData());
        $this->storeImage($place);

        return redirect()
            ->route('places.show', $place->id)
            ->with('status', 'Succesfully Added!');
    }

    public function show(Place $place)
    {

        $toas = TOA::all();
        $cities = Place::where('type', 'city')->get();
        // dd($place);
        return view('places.show', compact('place', 'cities', 'toas'));
    }


    public function edit(Place $place)
    {
        $toas = TOA::all();
        $cities = Place::where('type', 'city')->get();
        // $puroks = Purok::all()->sortBy('name');
        // $households = Household::all()->sortBy('family_name');
        return view('places.edit', compact('place', 'cities', 'toas'));
    }


    public function update(Request $request, Place $place)
    {
        $placeValidatedData = $this->validatedData();

        if ($place->image && request()->has('image')) {
            foreach (explode('|', $place->image) as $pic) {
                unlink(storage_path('app/public/' . $pic));
            }
            // unlink(storage_path('app/public/' . $place->image));
        }

        $place->update($placeValidatedData);

        $this->storeImage($place);

        return redirect()
            ->route('places.show', $place->id)
            ->with('status', 'Succesfully Updated!');
    }


    protected function validatedData()
    {
        return request()->validate([
            'name' => 'required',
            'details' => '',
            'type' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'lat' => 'required',
            'city_id' => 'required_if:type,attraction',
            'type_of_attractions' => 'required_if:type,attraction',
            //'image' => 'sometimes|file|image|max:2000',
        ]);
    }


    protected function storeImage($place)
    {
        $image_names = [];
        if (request()->has('image')) {
            // $place->update([
            //     'image' => request()->image->store('images/places', 'public'),
            // ]);

            foreach (request()->image as $file) {
                $image_names[] = $file->store('images/multiple', 'public');
            }
            // dd(implode('|', $image_names));
            $place->update([
                'image' => implode('|', $image_names),
            ]);

            // dd($image_names);
        }
    }
}
