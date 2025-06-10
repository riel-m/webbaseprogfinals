<?php

namespace App\Http\Controllers;

use App\Models\animals;
use Illuminate\Http\Request;
use \App\Models\centres;

class animalscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = animals::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    public function create()
    {
        $centres = centres::all();
        return view('animals.create', compact('centres'));
    }

    //store
    public function store(Request $request)
{
    $request->validate(
        [
            'name' => 'required',
            'breed' => 'required',
            'age' => 'required|numeric',
            'centre_id' => 'required',
            'desc' => 'required|max:2048',
            'image' => 'image|file|max:2048'
        ],
        [
            'name.required' => 'Name can\'t be empty!',
            'breed.required' => 'The genes Mason!, what do they mean?! can\'t be empty!',
            'age.required' => 'U telling me this animal is beyond age? bffr can\'t be empty!',
            'centre_id.required' => 'Cuz where is blud supposed to get bro from TT',
            'desc.required' => 'So u just want potential adopters to come in blind huh? Unless they are but u get me can\'t be empty!'
        ]
    );

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('post-images');
    }

    animals::create([
        'name' => $request->name,
        'centre_id' => $request->centre_id,
        'breed' => $request->breed,
        'age' => $request->age,
        'desc' => $request->desc,
        'image' => $imagePath
    ]);

    return redirect('/animals');
}

    /**
     * Display the specified resource.
     */
    // public function show(Animals $animals)
    // {
    //     //
    // }

    public function show($id)
    {
        $animals = animals::findorfail($id);
        return view('animals.show', compact('animals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Animals $animals)
    // {
    //     //
    // }

    public function edit($id)
    {
        $animals = animals::findorfail($id);
        $centres = centres::all();
        return view('animals.edit', compact('animals', 'centres'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Animals $animals)
    // {
    //     //
    // }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'breed' => 'required',
                'age' => 'required|numeric',
                'centre_id' => 'required',
            ],
            [
                'name.required' => 'name can\'t be empty!',
                'breed.required' => 'breed can\'t be empty!',
                'age.required' => 'age can\'t be empty!',
                'centre_id' => 'Please choose your centre',
            ]
        );

        $animals = animals::findorfail($id);

        $animals_data = [
            'name' => $request->name,
            'centre_id' => $request->centre_id,
            'breed' => $request->breed,
            'age' => $request->age,
        ];

        $animals->update($animals_data);

        return view('animals.show', compact('animals'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $animals = animals::findorfail($id);
        $animals->delete();

        return redirect('/animals');
    }
}
