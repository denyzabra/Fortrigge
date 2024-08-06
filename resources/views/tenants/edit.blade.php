@extends('layout.master')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <!-- Main Content -->
    <main class="col-md-10">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Edit Tenant</h1>
                    <form action="{{ route('tenants.update', $tenant) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tenant->name) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $tenant->email) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $tenant->phone_number) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="property_id">Property</label>
                            <select name="property_id" id="property_id" class="form-control" required>
                                @foreach($properties as $property)
                                <option value="{{ $property->id }}" {{ $property->id == old('property_id', $tenant->property_id) ? 'selected' : '' }}>
                                    {{ $property->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="lease_start_date">Lease Start Date</label>
                            <input type="date" name="lease_start_date" id="lease_start_date" class="form-control" value="{{ old('lease_start_date', $tenant->lease_start_date ? $tenant->lease_start_date->format('Y-m-d') : '') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="lease_end_date">Lease End Date</label>
                            <input type="date" name="lease_end_date" id="lease_end_date" class="form-control" value="{{ old('lease_end_date', $tenant->lease_end_date ? $tenant->lease_end_date->format('Y-m-d') : '') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@push('styles')
<style>
    .container {
        padding: 20px;
    }

    .card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endpush
