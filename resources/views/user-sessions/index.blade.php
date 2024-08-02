@extends('layout.master')

@section('title', 'User Sessions')

@section('content')
<div class="container">
    <h1>User Sessions</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Session ID</th>
                <th>IP Address</th>
                <th>Last Activity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sessions as $session)
            <tr>
                <td>{{ $session->session_id }}</td>
                <td>{{ $session->ip_address }}</td>
                <td>{{ $session->last_activity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
