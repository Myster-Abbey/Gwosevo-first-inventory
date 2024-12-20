@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1>Edit Web Applicatiions</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('web.update', $content->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="project" class="form-label">Project</label>
                <input type="text" name="project" id="project" class="form-control" value="{{ $content->project }}">
            </div>

            <div class="mb-3">
                <label for="dbname" class="form-label">Database Name</label>
                <input type="text" name="dbname" id="dbname" class="form-control" value="{{ $content->dbname }}">
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" name="url" id="url" class="form-control" value="{{ $content->url }}">
            </div>

            <div class="mb-3">
                <label for="server_name" class="form-label">Server</label>
                <input type="text" name="server_name" id="server_name" class="form-control" value="{{ $content->server_name }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
