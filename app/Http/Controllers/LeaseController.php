<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function index()
    {
        $leases = Lease::all();
        return view('leases.index', compact('leases'));
    }

    public function create()
    {
        return view('leases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'tenant_id' => 'required|exists:tenants,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Lease::create($request->all());

        return redirect()->route('leases.index')->with('success', 'Lease created successfully.');
    }

    public function show(Lease $lease)
    {
        return view('leases.show', compact('lease'));
    }

    public function edit(Lease $lease)
    {
        return view('leases.edit', compact('lease'));
    }

    public function update(Request $request, Lease $lease)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'tenant_id' => 'required|exists:tenants,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $lease->update($request->all());

        return redirect()->route('leases.index')->with('success', 'Lease updated successfully.');
    }

    public function destroy(Lease $lease)
    {
        $lease->delete();
        return redirect()->route('leases.index')->with('success', 'Lease deleted successfully.');
    }
}
