@extends('layouts.auth')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Web Applications</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card" id="propertyList">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <a href="{{ route('web.create') }}" class="btn btn-primary">Add Content to Web</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project</th>
                                <th>Database Name</th>
                                <th>URL</th>
                                <th>Server</th>
                                <th>Created At</th>
                                <th>Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($webContent as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ $content->project }}</td>
                                    <td>{{ $content->dbname }}</td>
                                    <td>{{ $content->url }}</td>
                                    <td>{{ $content->server_name }}</td>
                                    <td>{{ $content->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <!-- Edit Button triggers Edit Modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $content->id }}">
                                            Edit
                                        </button>

                                        <!-- Delete Button triggers Delete Modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $content->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $content->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $content->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $content->id }}">Edit Contact</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Edit form -->
                                                <form action="{{ route('web.update', $content->id) }}" method="POST">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="project{{ $content->id }}" class="form-label">Project</label>
                                                        <input type="text" name="project" class="form-control" id="project{{ $content->id }}" value="{{ $content->project }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dbname{{ $content->id }}" class="form-label">Database Name</label>
                                                        <input type="text" name="dbname" class="form-control" id="dbname{{ $content->id }}" value="{{ $content->dbname }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="url{{ $content->id }}" class="form-label">URL</label>
                                                        <input type="text" name="url" class="form-control" id="url{{ $content->id }}" value="{{ $content->url }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="server_name{{ $content->id }}" class="form-label">Server</label>
                                                        <input type="text" name="server_name" class="form-control" id="server_name{{ $content->id }}" value="{{ $content->server_name }}" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $content->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $content->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $content->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this Web Application?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('web.destroy', $content->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
