@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>Upload Biodata</h1>
        <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Document</label>
                <input type="file" id="file" name="file" class="form-control" required>
                <small class="form-text text-muted">Upload a PDF or DOC file.</small>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </main>
</div>
@endsection
