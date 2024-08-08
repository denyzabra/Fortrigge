@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Maintenance Records</h1>
        <a href="{{ route('maintenance_records.create') }}" class="btn btn-primary mb-3">Add New Record</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Details</th>
                        <th>Service Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maintenanceRecords as $record)
                    <tr>
                        <td>{{ $record->request ? $record->request->id : 'N/A' }}</td>
                        <td>{{ $record->details }}</td>
                        <td>{{ $record->service_date->format('Y-m-d') }}</td>|
                        <td>
                            <a href="{{ route('maintenance_records.edit', $record->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('maintenance_records.destroy', $record->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
