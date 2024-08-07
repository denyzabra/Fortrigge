@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Edit Service Provider</h1>

        <form action="{{ route('service_providers.update', $serviceProvider->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $serviceProvider->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $serviceProvider->email) }}" required>
            </div>
            
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $serviceProvider->phone_number) }}" required>
            </div>
            
            <div class="form-group">
                <label for="service_type">Service Type</label>
                <input type="text" class="form-control" id="service_type" name="service_type" value="{{ old('service_type', $serviceProvider->service_type) }}" required>
            </div>

            <div class="form-group">
                <label for="tenants">Tenants</label>
                <select multiple class="form-control" id="tenants" name="tenants[]">
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}" {{ in_array($tenant->id, $serviceProvider->tenants->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $tenant->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="properties">Properties</label>
                <select multiple class="form-control" id="properties" name="properties[]">
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}" {{ in_array($property->id, $serviceProvider->properties->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $property->address }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </main>
</div>
@endsection
