@extends('layout.master')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <!-- Main Content -->
    <main class="col-md-10">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-3">Tenant List</h1>
                    <a href="{{ route('tenants.create') }}" class="btn btn-primary mb-3">Add New Tenant</a>

                    <!-- Tenant Table -->
                    <div class="table-responsive">
                        <table id="tenantTable" class="table table-striped dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Property</th>
                                    <th>Lease Start Date</th>
                                    <th>Lease End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->name }}</td>
                                    <td>{{ $tenant->email }}</td>
                                    <td>{{ $tenant->phone_number }}</td>
                                    <td>{{ $tenant->property->name }}</td>
                                    <td>{{ $tenant->lease_start_date ? \Carbon\Carbon::parse($tenant->lease_start_date)->format('Y-m-d') : 'N/A' }}</td>
                                    <td>{{ $tenant->lease_end_date ? \Carbon\Carbon::parse($tenant->lease_end_date)->format('Y-m-d') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('tenants.destroy', $tenant) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
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
        </div>
    </main>
</div>
@endsection

@push('styles')
<style>
    .container {
        padding: 20px;
    }

    .card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endpush

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
        $('#tenantTable').DataTable({
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
        return confirm('Are you sure you want to delete this tenant? This action cannot be undone.');
    }
</script>
@endpush
