@extends('layout.master')

@section('content')
<div class="whitebox">
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2">
            <!-- Sidebar content or menu here -->
        </aside>

        <!-- Main Content -->
        <main class="col-md-10">
            <div class="card mb-3">
                <div class="card-body">
                    <h1>Edit Property</h1>

                    <form action="{{ route('properties.update', $property) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $property->name }}" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" maxlength="500" required>{{ $property->description }}</textarea>
                            <small id="descriptionCounter" class="form-text text-muted">{{ strlen($property->description) }}/500 characters</small>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $property->price }}" required>
                        </div>

                        <!-- Thumbnail Image -->
                        <div class="form-group">
                            <label for="thumbnail_image">Thumbnail Image URL</label>
                            <input type="text" name="thumbnail_image" id="thumbnail_image" class="form-control" value="{{ $property->thumbnail_image }}">
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" maxlength="15" value="{{ $property->location }}" required>
                            <small id="locationCounter" class="form-text text-muted">{{ strlen($property->location) }}/15 characters</small>
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" maxlength="15" value="{{ $property->address }}" required>
                            <small id="addressCounter" class="form-text text-muted">{{ strlen($property->address) }}/15 characters</small>
                        </div>

                        <!-- Housing Type -->
                        <div class="form-group">
                            <label for="housing_type_id">Housing Type</label>
                            <select name="housing_type_id" id="housing_type_id" class="form-control" required>
                                @foreach($housingTypes as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $property->housing_type_id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Land Type -->
                        <div class="form-group">
                            <label for="land_type_id">Land Type</label>
                            <select name="land_type_id" id="land_type_id" class="form-control" required>
                                @foreach($landTypes as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $property->land_type_id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const description = document.getElementById('description');
        const descriptionCounter = document.getElementById('descriptionCounter');
        
        const location = document.getElementById('location');
        const locationCounter = document.getElementById('locationCounter');
        
        const address = document.getElementById('address');
        const addressCounter = document.getElementById('addressCounter');

        description.addEventListener('input', function() {
            const remaining = 500 - description.value.length;
            descriptionCounter.textContent = `${description.value.length}/500 characters`;
        });

        location.addEventListener('input', function() {
            const remaining = 15 - location.value.length;
            locationCounter.textContent = `${location.value.length}/15 characters`;
        });

        address.addEventListener('input', function() {
            const remaining = 15 - address.value.length;
            addressCounter.textContent = `${address.value.length}/15 characters`;
        });
    });
</script>
@endpush
