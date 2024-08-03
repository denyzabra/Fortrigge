@extends('layouts.app')

@section('content')
    <h1>Housing Types</h1>
    <a href="{{ route('housing_types.create') }}" class="btn btn-primary">Add Housing Type</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($housingTypes as $housingType)
                <tr>
                    <td>{{ $housingType->name }}</td>
                    <td>
                        <a href="{{ route('housing_types.edit', $housingType->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('housing_types.destroy', $housingType->id) }}" method="POST" style="display:inline;">
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
