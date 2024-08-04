<?php

// app/Http/Controllers/DocumentController.php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the documents.
     */
    public function index()
    {
        $documents = Document::with('documentType', 'property')->get();
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new document.
     */
    public function create()
    {
        $documentTypes = DocumentType::all();
        $properties = Property::all();
        return view('documents.create', compact('documentTypes', 'properties'));
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'property_id' => 'nullable|exists:properties,id',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // File validation
        ]);

        // Handle file upload
        $filePath = $request->file('file')->store('documents', 'public');

        // Create document entry
        Document::create([
            'document_type_id' => $request->document_type_id,
            'property_id' => $request->property_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
    }

    
}

