<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockScreenController extends Controller
{
    public function show()
    {
        return view('lock-screen');
    }

    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if(auth()->attempt(['email' => auth()->user()->email, 'password' => $request->password])){
            return redirect()->intended('dashboard');
        }
    return back()->withErrors(['password' => 'The password is incorrect']);
    }
}
