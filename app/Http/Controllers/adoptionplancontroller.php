<?php

namespace App\Http\Controllers;

use App\Models\animals;
use App\Models\adoptionplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adoptionplancontroller extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request, $animalId)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id'
        ]);

        $user = Auth::user();

        // Check if user already has an adoption plan for this animal
        $existingAdoption = adoptionplan::where('user_id', $user->id)
            ->where('animal_id', $animalId)
            ->first();

        if ($existingAdoption) {
            return redirect()->back()->with('error', 'You have already adopted this animal!');
        }

        $adoptionplan = adoptionplan::create([
            'animal_id' => $animalId,
            'user_id' => $user->id,
            'adopter_name' => $user->name,
            'adopter_email' => $user->email,
        ]);

        return redirect()->back()->with('success', 'Adoption successful!');
    }

    public function show(adoptionplan $adoptionplan) {}

    public function edit(adoptionplan $adoptionplan) {}

    /* public function update(updateadoptionplanrequest $request, adoptionplan $adoptionplan) {} */

    public function destroy(adoptionplan $adoptionplan) {}
}
