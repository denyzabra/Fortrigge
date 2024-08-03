@extends('layout.master')

@section('content')
    <h1>Property Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $property->name }}</h5>
            <p class="card-text">{{ $property->description }}</p>
            <p class="card-text">Price: ${{ number_format($property->price, 2) }}</p>
            <p class="card-text">Housing Type: {{ $property->housingType->name }}</p>
            <p class="card-text">Land Type: {{ $property->landType->name }}</p>
            <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
