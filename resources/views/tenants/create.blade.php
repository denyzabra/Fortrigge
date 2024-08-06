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
                <br>
                <div class="card-body">
                    <br><br>
                    <h1 class="mb-4">Add New Tenant</h1>

                    <!-- Tenant Creation Form -->
                    <form action="{{ route('tenants.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="property_id" class="form-label">Property</label>
                            <select name="property_id" id="property_id" class="form-control" required>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="lease_start_date" class="form-label">Lease Start Date</label>
                            <input type="date" name="lease_start_date" id="lease_start_date" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="lease_end_date" class="form-label">Lease End Date</label>
                            <input type="date" name="lease_end_date" id="lease_end_date" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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
