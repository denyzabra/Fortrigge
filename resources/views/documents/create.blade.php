
@extends('layout.master')

@section('content')
<div class="container">
    <h1>Add New Document</h1>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="document_type_id">Document Type</label>
            <select name="document_type_id" id="document_type_id" class="form-control">
                @foreach ($documentTypes as $documentType)
                    <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="property_id">Property</label>
            <select name="property_id" id="property_id" class="form-control">
                <option value="">N/A</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Document</button>
    </form>
</div>
@endsection
