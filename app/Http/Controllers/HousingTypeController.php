<?php

namespace App\Http\Controllers;

use App\Models\HousingType;
use Illuminate\Http\Request;

class HousingTypeController extends Controller
{
    public function index()
    {
        $housingTypes = HousingType::all();
        return view('housing_types.index', compact('housingTypes'));
    }

    public function create()
    {
        return view('housing_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:housing_types',
        ]);

        HousingType::create($request->all());
        return redirect()->route('housing_types.index')->with('success', 'Housing Type created successfully.');
    }

    public function edit(HousingType $housingType)
    {
        return view('housing_types.edit', compact('housingType'));
    }

    public function update(Request $request, HousingType $housingType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:housing_types,name,' . $housingType->id,
        ]);
        $housingType->update($request->all());
        return redirect()->route('housing_types.index')->with('success', 'Housing Type updated successfully.');
    }

    public function destroy(HousingType $housingType)
    {
        $housingType->delete();
        return redirect()->route('housing_types.index')->with('success', 'Housing Type deleted successfully.');
    }
}

