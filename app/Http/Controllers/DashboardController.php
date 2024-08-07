<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTenants =  Tenant::count();
        return view('dashboard', compact('totalTenants')); 
    }
}
