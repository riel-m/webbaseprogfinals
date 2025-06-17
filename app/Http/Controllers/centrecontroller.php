<?php

namespace App\Http\Controllers;

use App\Models\centres;
use Illuminate\Http\Request;

class centrecontroller extends Controller
{
    public function index()
    {
        $centres = centres::all();
        return view('centres.index', compact('centres'));
    }

    public function create()
    {
        $centres = centres::all();
        return view('centres.create', compact('centres'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'location' => 'required',
                'telephone' => 'required',
                'email' => 'required'
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'location.required' => 'Where is this? the void? Location can\'t be empty!',
                'telephone.required' => 'ring ring???',
                'email.required' => "Email can't be empty"
            ]
        );

        //Crud
        centres::create([
            'name' => $request->name,
            'location' => $request->location,
            'telephone' => $request->telephone,
            'email' => $request->email
        ]);

        return redirect('/centre');
    }

    //cRud
    public function show($id)
    {
        $centres = centres::findorfail($id);
        return view('centres.show', compact('centres'));
    }

    //crUd
    public function edit($id)
    {
        $centres = centres::findorfail($id);
        return view('centres.edit', compact('centres'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'location' => 'required',
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'location.required' => 'Location can\'t be empty!',
            ]
        );

        $centres = centres::findOrFail($id);

        $centres_data = [
            'name' => $request->name,
            'location' => $request->location,
        ];

        $centres->update($centres_data);

        return redirect('/centres');
    }

    //cruD
    public function destroy($id)
    {
        $animals = centres::findorfail($id);
        $animals->delete();

        return redirect('/centre');
    }
}
