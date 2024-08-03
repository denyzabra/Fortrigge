@extends('layout.master')

@section('content')
    <h1>Properties</h1>
    <a href="{{ route('properties.create') }}" class="btn btn-primary">Add Property</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Housing Type</th>
                <th>Land Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->description }}</td>
                    <td>${{ number_format($property->price, 2) }}</td>
                    <td>{{ $property->housingType->name }}</td>
                    <td>{{ $property->landType->name }}</td>
                    <td>
                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
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
