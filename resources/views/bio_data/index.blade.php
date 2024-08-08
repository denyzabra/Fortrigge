@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Biodata</h1>
        <a href="{{ route('biodata.create') }}" class="btn btn-primary mb-3">Upload New Biodata</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Document</th>
                        <th>Uploaded At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($biodata as $data)
                    <tr>
                        <td>
                            <a href="{{ Storage::url($data->file_path) }}" target="_blank">View Document</a>
                        </td>
                        <td>{{ $data->created_at->format('d-m-Y') }}</td>
                        <td>
                            <!-- Add actions like edit/delete if needed in future -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
