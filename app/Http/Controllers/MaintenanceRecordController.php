<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRecord;
use App\Models\Request; // Update to use the Request model
use Illuminate\Http\Request as HttpRequest;

class MaintenanceRecordController extends Controller
{
    public function index()
    {
        $maintenanceRecords = MaintenanceRecord::with('request')->get(); // Updated relation name
        return view('maintenance_records.index', compact('maintenanceRecords'));
    }

    public function create()
    {
        $requests = Request::all(); // Updated to use the Request model
        return view('maintenance_records.create', compact('requests'));
    }

    public function store(HttpRequest $request)
    {
        $request->validate([
            'request_id' => 'required|exists:requests,id', // Updated to use request_id
            'details' => 'required|string',
            'service_date' => 'required|date',
        ]);

        MaintenanceRecord::create([
            'request_id' => $request->input('request_id'), // Updated to use request_id
            'details' => $request->input('details'),
            'service_date' => $request->input('service_date'),
        ]);

        return redirect()->route('maintenance_records.index')->with('success', 'Maintenance record added successfully.');
    }

    public function edit(MaintenanceRecord $maintenanceRecord)
    {
        $requests = Request::all(); // Updated to use the Request model
        return view('maintenance_records.edit', compact('maintenanceRecord', 'requests'));
    }

    public function update(HttpRequest $request, MaintenanceRecord $maintenanceRecord)
    {
        $request->validate([
            'request_id' => 'required|exists:requests,id', // Updated to use request_id
            'details' => 'required|string',
            'service_date' => 'required|date',
        ]);

        $maintenanceRecord->update([
            'request_id' => $request->input('request_id'), // Updated to use request_id
            'details' => $request->input('details'),
            'service_date' => $request->input('service_date'),
        ]);

        return redirect()->route('maintenance_records.index')->with('success', 'Maintenance record updated successfully.');
    }

    public function destroy(MaintenanceRecord $maintenanceRecord)
    {
        $maintenanceRecord->delete();
        return redirect()->route('maintenance_records.index')->with('success', 'Maintenance record deleted successfully.');
    }
}
