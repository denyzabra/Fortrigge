@extends('layout.master')

@section('content')
<div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2">
            <!-- Sidebar content or menu here -->
        </aside>

        <!-- Main Content -->
        <main class="col-md-10">
<h1>Tenant List</h1>
<a href="{{ route('tenants.create') }}" class="btn btn-primary">Add New Tenant</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Property</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tenants as $tenant)
        <tr>
            <td>{{ $tenant->name }}</td>
            <td>{{ $tenant->email }}</td>
            <td>{{ $tenant->phone_number }}</td>
            <td>{{ $tenant->property->name }}</td>
            <td>
                <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-info">View</a>
                <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tenants.destroy', $tenant) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
