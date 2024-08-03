@extends('layouts.app')

@section('content')
    <h1>Edit Land Type</h1>
    <form action="{{ route('land_types.update', $landType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $landType->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
