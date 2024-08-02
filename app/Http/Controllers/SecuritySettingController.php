<?php

namespace App\Http\Controllers;

use App\Models\SecuritySetting;
use Illuminate\Http\Request;

class SecuritySettingController extends Controller
{
    public function index()
    {
        $settings = SecuritySetting::firstOrCreate(
            ['user_id' => auth()->id()],
            ['two_factor_auth' => false] // Default value
        );

        return view('security-setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'two_factor_auth' => 'required|boolean',
        ]);

        SecuritySetting::updateOrCreate(
            ['user_id' => auth()->id()],
            ['two_factor_auth' => $request->two_factor_auth]
        );

        return redirect()->route('security-setting.index')->with('success', 'Security Settings updated successfully');
    }
}
