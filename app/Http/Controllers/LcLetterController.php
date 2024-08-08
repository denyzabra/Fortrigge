<?php

namespace App\Http\Controllers;

use App\Models\LcLetter;
use Illuminate\Http\Request;

class LcLetterController extends Controller
{
    public function index()
    {
        $lcletters =  LCLetter::all();
        return view('lc_letters.index', compact('lcletters'));
    }
    public function create()
    {
        return view('lc_letters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:200000'
        ]);
        $filePath = $request->file('file')->store('lc_letters');
        LcLetter::create(['file_path' => $filePath]);
        return redirect()->route('lc_letters.index')->with('success', 'Lc Letter uploaded successfully');
    }
}

