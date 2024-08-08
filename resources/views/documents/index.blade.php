@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>{{ $documentTypes->name }} Documents</h1>
        <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">Add New Document</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>File</th>
                        <th>Property</th>
                        <th>Tenant</th>
                        <th>Service Provider</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->title }}</td>
                        <td><a href="{{ Storage::url($document->file_path) }}" target="_blank">View File</a></td>
                        <td>{{ $document->property ? $document->property->name : 'N/A' }}</td>
                        <td>{{ $document->tenant ? $document->tenant->name : 'N/A' }}</td>
                        <td>{{ $document->serviceProvider ? $document->serviceProvider->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
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
