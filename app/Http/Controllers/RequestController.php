<?php

// app/Http/Controllers/RequestController.php
namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Tenant;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::with('tenant')->get();
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        $tenants = Tenant::all();
        return view('requests.create', compact('tenants'));
    }

    public function store(HttpRequest $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        Request::create($request->all());

        return redirect()->route('requests.index')->with('success', 'Request created successfully.');
    }

    public function edit(Request $request)
    {
        $tenants = Tenant::all();
        return view('requests.edit', compact('request', 'tenants'));
    }

    public function update(HttpRequest $request, Request $requestModel)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $requestModel->update($request->all());

        return redirect()->route('requests.index')->with('success', 'Request updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->delete();

        return redirect()->route('requests.index')->with('success', 'Request deleted successfully.');
    }
}
