@extends('layout.master')


@section('content')
<div class="row">
        <!-- Sidebar -->
        <aside class="col-md-2">
            <!-- Sidebar content or menu here -->
        </aside>

        <!-- Main Content -->
        <main class="col-md-10">
    <h1>Property Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $property->name }}</h5>
            <p class="card-text">{{ $property->description }}</p>
            <p class="card-text">Price: ${{ number_format($property->price, 2) }}</p>
            <p class="card-text">Housing Type: {{ $property->housingType->name }}</p>
            <p class="card-text">Land Type: {{ $property->landType->name }}</p>
            <p class="card-text">Location: {{ $property->location }}</p>
            <p class="card-text">Address: {{ $property->address }}</p>
            <img src="{{ asset('storage/' . $property->thumbnail_image) }}" alt="Thumbnail Image" class="img-fluid mb-3">

            <!-- Property Documents DataTable -->
            <div class="table-responsive">
                <h5 class="mt-4">Property Documents</h5>
                <table id="documents-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Document Type</th>
                            <th>Description</th>
                            <th>Path</th>
                        </tr>
                    </thead>
                    <tbody>
    @if($property->documents)
        @foreach ($property->documents as $document)
            <tr>
                <td>{{ $document->documentType->name }}</td>
                <td>{{ $document->description }}</td>
                <td><a href="{{ asset('storage/' . $document->path) }}" target="_blank">View Document</a></td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3">No documents available.</td>
        </tr>
    @endif
</tbody>

                </table>
            </div>

            <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables-buttons/datatables-buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables-buttons/buttons.html5.min.js') }}"></script> -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#documents-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ],
                responsive: true
            });
        });
    </script>
@endsection
