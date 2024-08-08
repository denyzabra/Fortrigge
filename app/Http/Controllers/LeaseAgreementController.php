<?php

namespace App\Http\Controllers;

use App\Models\LeaseAgreement;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;

class LeaseAgreementController extends Controller
{
    public function index()
    {
        $leaseAgreements = LeaseAgreement::with(['tenant', 'property'])->get();
        return view('lease_agreements.index', compact('leaseAgreements'));
    }

    public function create()
    {
        $tenants = Tenant::all();
        $properties = Property::all(); // Corrected variable name
        return view('lease_agreements.create', compact('tenants', 'properties')); // Corrected variable name
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'details' => 'nullable|string',
        ]);

        $data = $request->all();
        if ($request->hasFile('document')) {
            $data['document'] = $request->file('document')->store('lease_agreements');
        }

        LeaseAgreement::create($data);

        return redirect()->route('lease_agreements.index')->with('success', 'Lease agreement added successfully.');
    }

    public function edit(LeaseAgreement $leaseAgreement)
    {
        $tenants = Tenant::all();
        $properties = Property::all();
        return view('lease_agreements.edit', compact('leaseAgreement', 'tenants', 'properties')); // Corrected variable names
    }

    public function update(Request $request, LeaseAgreement $leaseAgreement)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:200000',
            'details' => 'nullable|string',
        ]);

        $data = $request->all();
        if ($request->hasFile('document')) {
            if ($leaseAgreement->document) {
                Storage::delete($leaseAgreement->document);
            }
            $data['document'] = $request->file('document')->store('lease_agreements');
        }

        $leaseAgreement->update($data);

        return redirect()->route('lease_agreements.index')->with('success', 'Lease agreement updated successfully.');
    }

    public function destroy(LeaseAgreement $leaseAgreement)
    {
        // Delete file if exists
        if ($leaseAgreement->document) {
            Storage::delete($leaseAgreement->document);
        }

        $leaseAgreement->delete();

        return redirect()->route('lease_agreements.index')->with('success', 'Lease agreement deleted successfully.');
    }
}
