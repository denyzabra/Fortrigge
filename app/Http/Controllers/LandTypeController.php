<?php

namespace App\Http\Controllers;

use App\Models\LandType;
use Illuminate\Http\Request;

class LandTypesController extends Controller
{
    public function index()
    {
        $landTypes = LandType::all();
        return view('land_types.index', compact('landTypes'));
    }

    public function create()
    {
        return view('land_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:land_types',
        ]);
        LandType::create($request->all());
        return redirect()->route('land_types.index')->with('success', 'Land Type created successfully.');
    }

    public function edit(LandType $landType)
    {
        return view('land_types.edit', compact('landType'));
    }

    public function update(Request $request, LandType $landType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:land_types,name,' . $landType->id,
        ]);
        $landType->update($request->all());
        return redirect()->route('land_types.index')->with('success', 'Land Type updated successfully.');
    }

    public function destroy(LandType $landType)
    {
        $landType->delete();
        return redirect()->route('land_types.index')->with('success', 'Land Type deleted successfully.');
    }
}
