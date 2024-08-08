@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Add New Document</h1>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="file_path">File</label>
                <input type="file" name="file_path" id="file_path" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="document_type_id">Document Type</label>
                <select name="document_type_id" id="document_type_id" class="form-control" required>
                    @foreach($documentTypes as $documentType)
                        <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="property_id">Property</label>
                <select name="property_id" id="property_id" class="form-control">
                    <option value="">Select Property</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tenant_id">Tenant</label>
                <select name="tenant_id" id="tenant_id" class="form-control">
                    <option value="">Select Tenant</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service_provider_id">Service Provider</label>
                <select name="service_provider_id" id="service_provider_id" class="form-control">
                    <option value="">Select Service Provider</option>
                    @foreach($serviceProviders as $serviceProvider)
                        <option value="{{ $serviceProvider->id }}">{{ $serviceProvider->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Document</button>
        </form>
    </main>
</div>
@endsection
