@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Document Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $document->title }}</h5>
                <p class="card-text">Type: {{ $document->documentType->name }}</p>
                <p class="card-text">Property: {{ $document->property ? $document->property->name : 'N/A' }}</p>
                <p class="card-text">Tenant: {{ $document->tenant ? $document->tenant->name : 'N/A' }}</p>
                <p class="card-text">Service Provider: {{ $document->serviceProvider ? $document->serviceProvider->name : 'N/A' }}</p>
                <a href="{{ Storage::url($document->file_path) }}" target="_blank" class="btn btn-primary">View File</a>
                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
