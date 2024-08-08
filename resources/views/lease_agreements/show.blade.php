@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Lease Agreement Details</h1>
        <div class="mb-3">
            <strong>Tenant:</strong> {{ $leaseAgreement->tenant->name }}
        </div>
        <div class="mb-3">
            <strong>Property:</strong> {{ $leaseAgreement->property->address }}
        </div>
        <div class="mb-3">
            <strong>Start Date:</strong> {{ $leaseAgreement->start_date->format('Y-m-d') }}
        </div>
        <div class="mb-3">
            <strong>End Date:</strong> {{ $leaseAgreement->end_date->format('Y-m-d') }}
        </div>
        <div class="mb-3">
            <strong>Document:</strong>
            @if($leaseAgreement->document)
                <a href="{{ Storage::url($leaseAgreement->document) }}" target="_blank">View Document</a>
            @else
                No Document
            @endif
        </div>
        <div class="mb-3">
            <strong>Details:</strong> {{ $leaseAgreement->details }}
        </div>
        <a href="{{ route('lease_agreements.edit', $leaseAgreement->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('lease_agreements.destroy', $leaseAgreement->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </main>
</div>
@endsection
