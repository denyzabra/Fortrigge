@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Create Maintenance Record</h1>
        <form action="{{ route('maintenance_records.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="request_id" class="form-label">Maintenance Request</label>
                <select id="request_id" name="request_id" class="form-select" required>
                    @foreach($requests as $request)
                        <option value="{{ $request->id }}">{{ $request->id }} - {{ $request->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea id="details" name="details" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="service_date" class="form-label">Service Date</label>
                <input type="date" id="service_date" name="service_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</div>
@endsection
