@extends('layout.master')

@section('title', 'Security Settings')

@section('content')
<div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2">
            <!-- Sidebar content or menu here -->
        </aside>

        <!-- Main Content -->
        <main class="col-md-10">
<div class="container">
    <h1>Security Settings</h1>
    <form action="{{ route('security-setting.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="two_factor_auth">Two-Factor Authentication</label>
            <select name="two_factor_auth" id="two_factor_auth" class="form-control">
                <option value="1" {{ isset($settings) && $settings->two_factor_auth ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ isset($settings) && !$settings->two_factor_auth ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save Settings</button>
    </form>
</div>
@endsection
