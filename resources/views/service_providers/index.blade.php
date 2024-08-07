@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Service Providers</h1>
        <a href="{{ route('service_providers.create') }}" class="btn btn-primary mb-3">Add New Service Provider</a>
        <div class="table-responsive">
            <table id="serviceProvidersTable" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Service Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceProviders as $serviceProvider)
                    <tr>
                        <td>{{ $serviceProvider->name }}</td>
                        <td>{{ $serviceProvider->email }}</td>
                        <td>{{ $serviceProvider->phone_number }}</td>
                        <td>{{ $serviceProvider->service_type }}</td>
                        <td>
                            <a href="{{ route('service_providers.edit', $serviceProvider) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('service_providers.destroy', $serviceProvider) }}" method="POST" style="display:inline;">
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

@push('scripts')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#serviceProvidersTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ]
        });
    });
</script>
@endpush
