<?php

namespace App\Http\Controllers;

use App\Place;
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

        return view('places.index', compact('places', 'search'));
    }


    public function create()
    {
        $cities = Place::where('type', 'city')->get();

        // $households = Household::all()->sortBy('family_name');
        return view('places.create', compact('cities'));
    }


    public function store(Request $request)
    {

        // dd(request()->all());
        $place = Place::create($this->validatedData());

        $this->storeImage($place);


        return redirect()
            ->route('places.show', $place->id)
            ->with('status', 'Succesfully Added!');
    }

    public function show(Place $place)
    {
        $cities = Place::where('type', 'city')->get();
        // dd($place);
        return view('places.show', compact('place', 'cities'));
    }


    public function edit(Place $place)
    {
        $cities = Place::where('type', 'city')->get();
        // $puroks = Purok::all()->sortBy('name');
        // $households = Household::all()->sortBy('family_name');
        return view('places.edit', compact('place', 'cities'));
    }


    public function update(Request $request, Place $place)
    {
        $placeValidatedData = $this->validatedData();

        if ($place->image && request()->has('image')) {
            unlink(storage_path('app/public/' . $place->image));
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
            'type' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'lat' => 'required',
            'city_of' => 'required_if:type,attraction',
            'type_of_attraction' => 'required_if:type,attraction',
            'image' => 'sometimes|file|image|max:2000',
        ]);
    }


    protected function storeImage($place)
    {
        if (request()->has('image')) {
            $place->update([
                'image' => request()->image->store('images/places', 'public'),
            ]);
        }
    }
}
