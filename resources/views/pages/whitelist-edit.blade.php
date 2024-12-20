@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1>Edit USSD Content</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('whitelist.update', $content->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="campaign" class="form-label">Campaign</label>
                <input type="text" name="campaign" id="campaign" class="form-control" value="{{ $content->campaign }}">
            </div>

            <div class="mb-3">
                <label for="shortcode" class="form-label">Short Code</label>
                <input type="text" name="shortcode" id="shortcode" class="form-control" value="{{ $content->shortcode }}">
            </div>

            <div class="mb-3">
                <label for="dbname" class="form-label">Database Name</label>
                <input type="text" name="dbname" id="dbname" class="form-control" value="{{ $content->dbname }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
