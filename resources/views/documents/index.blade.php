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
    <h2>Documents</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Document Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->documentType->name }}</td>
                    <td>{{ $document->description }}</td>
                    <td>
                        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-info">View</a>
                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
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
@endsection
