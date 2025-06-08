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
        $animals = Animals::all();
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'breed' => 'required',
                'age' => 'required|numeric',
                'centres_id' => 'required',
                'desc' => 'required|max:2048',
                'image' => 'image|file|max:2048'
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'breed.required' => 'NRP can\'t be empty!',
                'age.required' => 'Jurusan can\'t be empty!',
                'centres_id' => 'Please choose your angkatan',
                'desc.required' => 'desc can\'t be empty!'
            ]
        );

        Animals::create([
            'name' => $request->name,
            'centres_id' => $request->center_id,
            'breed' => $request->breed,
            'age' => $request->age,
            'desc' => $request->desc,
            'image' => $request->file('image')->store('post-images')
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
        $animals = Animals::findorfail($id);
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
        $animals = Animals::findorfail($id);
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
                'centres_id' => 'required',
            ],
            [
                'name.required' => 'name can\'t be empty!',
                'breed.required' => 'breed can\'t be empty!',
                'age.required' => 'age can\'t be empty!',
                'centres_id' => 'Please choose your center',
            ]
        );

        $animals = Animals::findorfail($id);

        $animals_data = [
            'name' => $request->name,
            'centres_id' => $request->center_id,
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
        $animals = Animals::findorfail($id);
        $animals->delete();

        return redirect('/animals');
    }
}
