<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\Property;


class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        // $totalTenants = $tenants->count(); // Get the total number of tenants
        return view('tenants.index', compact('tenants'));
    }
    public function dashboard(){
        $tenantCount = Tenant::count();
        // dd($propertyCount);
        return view('dashboard', compact('tenantCount'));
    }

    public function create()
    {
        $properties = Property::all(); // Fetch all properties
        return view('tenants.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email',
            'phone_number' => 'required|string|max:15',
            'property_id' => 'required|exists:properties,id',
            'lease_start_date' => 'nullable|date',
            'lease_end_date' => 'nullable|date',
        ]);

        Tenant::create($request->all());
        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully.');
    }

    public function show($id)
    {
        
        $tenant = Tenant::with('property', 'leases')->findOrFail($id);
        return view('tenants.show', compact('tenant'));
    }

    public function edit($id)
    {
        $tenant = Tenant::findOrFail($id);
        $properties = Property::all();
        return view('tenants.edit', compact('tenant', 'properties'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email,' . $tenant->id,
            'phone_number' => 'required|string|max:15',
            'property_id' => 'required|exists:properties,id',
        ]);

        $tenant->update($request->all());
        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully.');
    }
}
