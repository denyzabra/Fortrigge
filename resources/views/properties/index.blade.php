@extends('layout.master')


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->

@section('content')
<!-- <div class="container-fluid"> -->
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2">
            <!-- Sidebar content or menu here -->
        </aside>

        <!-- Main Content -->
        <main class="col-md-10">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <h1>Properties</h1>
                        <a href="{{ route('properties.create') }}" class="btn btn-primary">Add Property</a>
                    </div>

                    <!-- Table -->
                    <table id="propertyTable" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Housing Type</th>
                                <th>Land Type</th>
                                <th>Location</th>
                                <th>Address</th>
                                <th>Thumbnail</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <td>{{ $property->name }}</td>
                                    <td>{{ $property->description }}</td>
                                    <td>${{ number_format($property->price, 2) }}</td>
                                    <td>{{ $property->housingType->name }}</td>
                                    <td>{{ $property->landType->name }}</td>
                                    <td>{{ $property->location }}</td>
                                    <td>{{ $property->address }}</td>
                                    <td>
                                        @if ($property->thumbnail_image)
                                            <img src="{{ asset('storage/thumbnails/' . $property->thumbnail_image) }}" alt="Thumbnail" style="max-width: 100px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
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
        $('#propertyTable').DataTable({
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
