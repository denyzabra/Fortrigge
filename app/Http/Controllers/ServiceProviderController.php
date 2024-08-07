<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Tenant;
use App\Models\Property;

class ServiceProviderController extends Controller
{
    public function index()
    {
        $serviceProviders = ServiceProvider::all();
        return view('service_providers.index', compact('serviceProviders'));
    }


    public function create()
    {
        // return view('service_providers.create');
        $tenants = Tenant::all();
        $properties = Property::all();
        return view('service_providers.index', compact('tenants', 'properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:service_providers,email',
            'phone_number' => 'required|string|max:15',
            'service_type' => 'required|string|max:50',
        ]);

        $serviceProviders = ServiceProvider::create($request->all());
        $serviceProviders->tenants()->sync($request->tenants);
        $serviceProviders->properties()->sync($request->properties);

        return redirect()->route('service_providers.index')->with('success', 'Service Provider added successfully.');
    }

    public function show($id)
    {
        // return view('service_providers.show');
    }

    public function edit($id)
    {
        $serviceProvider = ServiceProvider::findOrFail($id); // Fetch the service provider by ID
        $tenants = Tenant::all();
        $properties = Property::all();
        return view('service_providers.edit', compact('serviceProvider', 'tenants', 'properties'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:service_providers,email,'. $id,
            'phone_number' => 'required|string|max:15',
            'service_type' => 'required|string|max:50',
        ]);

        $serviceProvider = ServiceProvider::all();
        $serviceProvider->update($request->all());
        $serviceProvider->tenants()->sync($request->tenants);
        $serviceProvider->properties()->sync($request->properties);

        return redirect()->route('service_providers.index')->with('success', 'Service Provider update Successfully');
    }

    public function destroy($id)
    {
        $serviceProvider = ServiceProvider::findOrFail($id);
        $serviceProvider->delete();
        return redirect()->route('service_providers.index')->with('success', 'Service Provider deleted successfully');
    }
}
