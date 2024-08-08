@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Lease Agreements</h1>
        <a href="{{ route('lease_agreements.create') }}" class="btn btn-primary mb-3">Add New Lease Agreement</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tenant</th>
                        <th>Property</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Document</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaseAgreements as $leaseAgreement)
                    <tr>
                        <td>{{ $leaseAgreement->tenant->name ?? 'No Tenant Assigned' }}</td>
                        <td>{{ $leaseAgreement->property->address ?? 'No Property Assigned' }}</td>
                        <td>{{ \Carbon\Carbon::parse($leaseAgreement->start_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($leaseAgreement->end_date)->format('d-m-Y') }}</td>
                        <td>
                            @if($leaseAgreement->document)
                                <a href="{{ Storage::url($leaseAgreement->document) }}" target="_blank">View Document</a>
                            @else
                                No Document
                            @endif
                        </td>
                        <td>{{ $leaseAgreement->details ?? 'No Details Provided' }}</td>
                        <td>
                            <a href="{{ route('lease_agreements.edit', $leaseAgreement->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('lease_agreements.destroy', $leaseAgreement->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
