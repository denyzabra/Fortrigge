@extends('layout.master')

@section('content')
<h1>Edit Tenant</h1>
<form action="{{ route('tenants.update', $tenant) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $tenant->name }}" required>
    </div>
    <div class="form-group">
        <label
@endsection