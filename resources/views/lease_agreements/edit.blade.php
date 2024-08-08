@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Edit Lease Agreement</h1>
        <form action="{{ route('lease_agreements.update', $leaseAgreement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tenant_id" class="form-label">Tenant</label>
                <select id="tenant_id" name="tenant_id" class="form-select" required>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}" {{ $tenant->id == $leaseAgreement->tenant_id ? 'selected' : '' }}>
                            {{ $tenant->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="property_id" class="form-label">Property</label>
                <select id="property_id" name="property_id" class="form-select" required>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}" {{ $property->id == $leaseAgreement->property_id ? 'selected' : '' }}>
                            {{ $property->address }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $leaseAgreement->start_date->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $leaseAgreement->end_date->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="document" class="form-label">Document</label>
                @if($leaseAgreement->document)
                    <a href="{{ Storage::url($leaseAgreement->document) }}" target="_blank">View Current Document</a>
                @endif
                <input type="file" id="document" name="document" class="form-control">
                <small class="form-text text-muted">Optional PDF or DOC file, max 2MB.</small>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea id="details" name="details" class="form-control" rows="4">{{ $leaseAgreement->details }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </main>
</div>
@endsection
