<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\HousingType;
use App\Models\LandType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['housingType', 'landType'])->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $housingTypes = HousingType::all();
        $landTypes = LandType::all();
        return view('properties.create', compact('housingTypes', 'landTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'thumbnail_image' => 'nullable|string',
            'housing_type_id' => 'required|exists:housing_types,id',
            'land_type_id' => 'required|exists:land_types,id',
        ]);

        Property::create($request->all());
        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        $housingTypes = HousingType::all();  // Corrected class name
        $landTypes = LandType::all();
        return view('properties.show', compact('property', 'housingTypes', 'landTypes'));
    }

    public function edit(Property $property)
    {
        $housingTypes = HousingType::all();
        $landTypes = LandType::all();
        return view('properties.edit', compact('property', 'housingTypes', 'landTypes'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'thumbnail_image' => 'nullable|string',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'housing_type_id' => 'required|exists:housing_types,id',
            'land_type_id' => 'required|exists:land_types,id',
        ]);

        $property->update($request->all());
        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }

    public function dashboard()
    {
        $propertyCount = Property::count();
        // dd($propertyCount);
        return view('dashboard', compact('propertyCount'));
    }
}
