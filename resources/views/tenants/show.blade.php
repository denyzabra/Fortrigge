@extends('layout.master')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <!-- Main Content -->
    <main class="col-md-10">
        <br>
        <div class="card mb-3">
            <div class="card-body">
                <h1>Tenant Details</h1>
                <div class="mb-3">
                    <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Back to List</a>
                </div>

                <!-- Tenant Info -->
                <div class="mb-3">
                    <p><strong>Name:</strong> {{ $tenant->name }}</p>
                    <p><strong>Email:</strong> {{ $tenant->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $tenant->phone_number }}</p>
                    <p><strong>Property:</strong> {{ $tenant->property ? $tenant->property->name : 'N/A' }}</p>
                    <p><strong>Lease Start Date:</strong> {{ $tenant->lease_start_date ? $tenant->lease_start_date->format('Y-m-d') : 'N/A' }}</p>
                    <p><strong>Lease End Date:</strong> {{ $tenant->lease_end_date ? $tenant->lease_end_date->format('Y-m-d') : 'N/A' }}</p>
                </div>

                <!-- Leases Table -->
                <h3>Leases</h3>
                <div class="table-responsive">
                    <table id="leasesTable" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Lease Start Date</th>
                                <th>Lease End Date</th>
                                <th>Property</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenant->leases as $lease)
                            <tr>
                                <td>{{ $lease->start_date->format('Y-m-d') }}</td>
                                <td>{{ $lease->end_date->format('Y-m-d') }}</td>
                                <td>{{ $lease->property ? $lease->property->name : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('leases.show', $lease->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('leases.edit', $lease->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('leases.destroy', $lease->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
            </div>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- DataTables and Export Buttons Scripts -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#leasesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ]
        });
    });

    function confirmDelete() {
        return confirm('Are you sure you want to delete this item? This action cannot be undone.');
    }
</script>
@endpush
