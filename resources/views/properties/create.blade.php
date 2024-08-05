@extends('layout.master')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>
<br><br>
    <!-- Main Content -->
    <main class="col-md-9">
        <br>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-4 text-primary">Create Property</h2>

                <form action="{{ route('properties.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6 mb-3">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                            </div>

                            <!-- Price -->
                            <div class="form-group">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                            </div>

                            <!-- Thumbnail Image -->
                            <div class="form-group">
                                <label for="thumbnail_image" class="form-label">Thumbnail Image URL</label>
                                <input type="text" name="thumbnail_image" id="thumbnail_image" class="form-control">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6 mb-3">
                            <!-- Location -->
                            <div class="form-group">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" class="form-control" required>
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>

                            <!-- Housing Type -->
                            <div class="form-group">
                                <label for="housing_type_id" class="form-label">Housing Type</label>
                                <select name="housing_type_id" id="housing_type_id" class="form-control" required>
                                    @foreach($housingTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Land Type -->
                            <div class="form-group">
                                <label for="land_type_id" class="form-label">Land Type</label>
                                <select name="land_type_id" id="land_type_id" class="form-control" required>
                                    @foreach($landTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
