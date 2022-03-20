<?php

namespace App\Http\Controllers;

use App\TOA;
use Illuminate\Http\Request;

class ToaController extends Controller
{
    public function index(Request $request)
    {
        // $TOAS = TOA::latest()->get();
        // return view('TOAS.index', compact('TOAS'));

        $search = '';

        if (!is_null($request->search)) {
            $TOAS = TOA::where('name', 'like', '%' . request()->search . '%')
                ->orWhere('details', 'like', '%' . request()->search . '%')
                ->orderBy('name')
                ->paginate(10);
            $TOAS->appends(['search' => $request->search]);

            $search = request()->search;
        } else {
            $TOAS = TOA::orderBy('name')->paginate(10);
        }

        return view('TOAS.index', compact('TOAS', 'search'));
    }

    public function store()
    {
        // dd(request()->all());
        $toa = TOA::create($this->validatedData());

        $this->storeImage($toa);

        return redirect()->back()->with('status', 'Successfully Added!');

        // return response(request()->details);
    }

    public function show(TOA $TOA)
    {
        return $TOA;
    }

    public function update(TOA $TOA)
    {
        // dd($TOA);
        $toaValidatedData = $this->validatedData();

        if ($TOA->image && request()->has('image')) {
            unlink(storage_path('app/public/' . $TOA->image));
        }
        $TOA->update($toaValidatedData);

        $this->storeImage($TOA);

        $TOAS = TOA::latest()->get();
        return redirect()->back()->with('status', 'Successfully Updated!');
    }

    protected function validatedData()
    {
        // dd(request()->TOA_id);
        return request()->validate([
            'name' => 'required',
            'details' => '',
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
