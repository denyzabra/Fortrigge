@extends('layout.master')

@section('content')
    <h1>Land Types</h1>
    <a href="{{ route('land_types.create') }}" class="btn btn-primary">Add Land Type</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($landTypes as $landType)
                <tr>
                    <td>{{ $landType->name }}</td>
                    <td>
                        <a href="{{ route('land_types.edit', $landType->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('land_types.destroy', $landType->id) }}" method="POST" style="display:inline;">
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
