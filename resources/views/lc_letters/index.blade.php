@extends('layout.master')

@section('content')
<div class="row">
    <aside class="col-md-2">
        <!-- Sidebar content or menu here -->
    </aside>

    <main class="col-md-10">
        <h1>LC Letters</h1>
        <a href="{{ route('lc_letters.create') }}" class="btn btn-primary mb-3">Upload New LC Letter</a>
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
                    @foreach($lcletters as $lcLetter)
                    <tr>
                        <td>
                            <a href="{{ Storage::url($lcletters->file_path) }}" target="_blank">View Document</a>
                        </td>
                        <td>{{ $lcLetter->created_at->format('d-m-Y') }}</td>
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
