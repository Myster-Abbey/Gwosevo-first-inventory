@extends('layouts.auth')

@section('pageTitle', 'Mobile Application')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <!-- <h4 class="mb-sm-0">Add Content to Mobile</h4> -->
                           <h4 class="mb-sm-0">Add content to Mobile Application</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card" id="propertyList">
                <div class="container">

             <form action="{{ route('mobile.store') }}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="project" class="form-label">Project</label>
                        <input type="text" class="form-control" id="project" name="project" required>
                        @error('project')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dbname" class="form-label">Database Name</label>
                        <input type="text" class="form-control" id="dbname" name="dbname" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url">
                         @error('url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="server_name" class="form-label">Server</label>
                        <input type="text" class="form-control" id="server_name" name="server_name">
                         @error('server_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Add to Mobile Applications</button>
            </div>

             </form>
        </div>
    </div>
@endsection
