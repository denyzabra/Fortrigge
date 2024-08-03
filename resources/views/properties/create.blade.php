@extends('layout.master')

@section('content')
    <h1>Add Property</h1>
    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="thumbnail_image">Thumbnail Image URL</label>
            <input type="text" name="thumbnail_image" id="thumbnail_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="housing_type_id">Housing Type</label>
            <select name="housing_type_id" id="housing_type_id" class="form-control" required>
                @foreach ($housingTypes as $housingType)
                    <option value="{{ $housingType->id }}">{{ $housingType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="land_type_id">Land Type</label>
            <select name="land_type_id" id="land_type_id" class="form-control" required>
                @foreach ($landTypes as $landType)
                    <option value="{{ $landType->id }}">{{ $landType->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
