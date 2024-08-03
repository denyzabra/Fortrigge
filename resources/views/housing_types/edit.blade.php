@extends('layout.master')

@section('content')
    <h1>Edit Housing Type</h1>
    <form action="{{ route('housing_types.update', $housingType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $housingType->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
