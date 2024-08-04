<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function index()
    {
        return view('service_providers.index');
    }

    public function create()
    {
        return view('service_providers.create');
    }

    public function store(Request $request)
    {
        // Logic to store service provider
    }

    public function show($id)
    {
        return view('service_providers.show');
    }

    public function edit($id)
    {
        return view('service_providers.edit');
    }

    public function update(Request $request, $id)
    {
        // Logic to update service provider
    }

    public function destroy($id)
    {
        // Logic to delete service provider
    }
}
