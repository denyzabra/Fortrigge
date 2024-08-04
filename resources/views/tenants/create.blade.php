@extends('layout.master')

@section('content')
<h1>Add New Tenant</h1>
<form action="{{ route('tenants.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="property_id">Property</label>
        <select name="property_id" id="property_id" class="form-control" required>
            @foreach($properties as $property)
            <option value="{{ $property->id }}">{{ $property->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
