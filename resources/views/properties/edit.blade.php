@extends('layout.master')

@section('content')
    <h1>Edit Property</h1>
    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $property->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $property->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $property->price }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="thumbnail_image">Thumbnail Image URL</label>
            <input type="text" name="thumbnail_image" id="thumbnail_image" class="form-control" value="{{ $property->thumbnail_image }}">
        </div>
        <div class="form-group">
            <label for="housing_type_id">Housing Type</label>
            <select name="housing_type_id" id="housing_type_id" class="form-control" required>
                @foreach ($housingTypes as $housingType)
                    <option value="{{ $housingType->id }}" {{ $property->housing_type_id == $housingType->id ? 'selected' : '' }}>{{ $housingType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="land_type_id">Land Type</label>
            <select name="land_type_id" id="land_type_id" class="form-control" required>
                @foreach ($landTypes as $landType)
                    <option value="{{ $landType->id }}" {{ $property->land_type_id == $landType->id ? 'selected' : '' }}>{{ $landType->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
