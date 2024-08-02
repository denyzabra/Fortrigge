<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model;


class UserSessionController extends Controller
{
    public function index()
    {
        $session = UserSession::where('user_id', auth()->id())->get();
        return view('user-sessions.index', compact('sessions'));
    }
}
