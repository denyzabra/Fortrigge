<?php

// app/Http/Controllers/DocumentController.php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the documents.
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $documentTypes = DocumentType::where('name', $type)->first();
        if(!$documentTypes){
            abort(404, 'Document not found.');
        }
        $documents = Document::where('document_type_id', $documentTypes->id)->get();
        return view('documents.index', compact('documents', 'documentTypes'));

    }

    /**
     * Show the form for creating a new document.
     */
    public function create()
    {
        $documentTypes = DocumentType::all();
        $properties = Property::all();
        $tenants = Tenant::all();
        $serviceProviders = ServiceProvider::all();
        return view('documents.create', compact('documentTypes', 'properties', 'tenants', 'serviceProviders'));
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request)
    {
       $request->vlaidate([
        'title' => 'required|string|max:255',
        'file' => 'required|file',
        'documentType' => 'required|exists:document_types, id',
       ]);
       $path = $request->file('file')->store('documents');

       Document::create([
        'title' => $request->title,
        'file_path' => $path,
        'document_type_id' => $request->document_type_id,
        'property_id' => $request->property_id,
        'tenant_id' => $request->tenant_id,
        'service_provider_id' => $request->service_provider_id,
       ]);
       return redirect()->route('documents.index', ['type' => $request->document_type_id])
       ->with('success', 'Document uploaded successfully');
    }

    public function update(Request $request, $id)
    {
       $document = Document::findOrFail($id);
       $request->validate([
        'title' => 'required|string|max:255',
        'file' => 'nullable|file',
        'documentType' => 'required|exists:document_types, id',
       ]);
       if($request->hasFile('file')){
        Storage::delete($document->file_path);
        $path = $request->file('file')->store('documents');
        $document->file_path = $path;
       }
       $document->update($request->only(['title', 'document_type_id', 'property_id', 'tenant_id', 'service_provider_id']));
       return redirect()->route('documents.index', ['type' => $document->document_type_id])
       ->with('success', 'Document updated successfully');
    }

    public function edit()
    {
        $document = Document::findOrFail();
        $documentType = DocumentType::all();
        $properties = Property::all();
        $tenants = Tenant::all();
        $serviceProvider = ServiceProvider::all();
        return view('documents.edit', compact('document', 'documentTypes', 'properties', 'tenants','serviceProviders'));
    }
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        Storage::delete($document->file_path);
        $document->delete();
        return redirect()->route('documents.index', ['type' => $document->document_type_id])
            ->with('success', 'Document deleted successfully.');
    }

    
}

