@extends('layout')

@section('content')
    <h1>Welcome to the Dashboard!</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
