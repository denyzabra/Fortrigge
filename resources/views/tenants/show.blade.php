@extends('layout.master')

@section('content')
<h1>Tenant Details</h1>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $tenant->name }}</h5>
    </div>
    <div class="card-body">
        <p><strong>Email:</strong> {{ $tenant->email }}</p>
        <p><strong>Phone Number:</strong> {{ $tenant->phone_number }}</p>
        <p><strong>Property:</strong> {{ $tenant->property->name }}</p>
        <!-- Add more details as needed -->

        <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('tenants.destroy', $tenant) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection
