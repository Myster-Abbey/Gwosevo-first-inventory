@extends('layouts.auth')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">USSD Applications</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card" id="propertyList">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <a href="{{ route('whitelist.create') }}" class="btn btn-primary">Add Content to USSD</a>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Campaign</th>
                                <th>Short Code</th>
                                <th>Database Name</th>
                                <th>Created At</th>
                                <th>Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($whitelistContacts as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ $content->campaign }}</td>
                                    <td>{{ $content->shortcode }}</td>
                                    <td>{{ $content->dbname }}</td>
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
                                                <form action="{{ route('whitelist.update', $content->id) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="campaign{{ $content->id }}" class="form-label">Campaign</label>
                                                        <input type="text" name="campaign" class="form-control" id="campaign{{ $content->id }}" value="{{ $content->campaign }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="shortcode{{ $content->id }}" class="form-label">Short Code</label>
                                                        <input type="text" name="shortcode" class="form-control" id="shortcode{{ $content->id }}" value="{{ $content->shortcode }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dbname{{ $content->id }}" class="form-label">Database Name</label>
                                                        <input type="text" name="dbname" class="form-control" id="dbname{{ $content->id }}" value="{{ $content->dbname }}" required>
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
                                                Are you sure you want to delete this USSD content?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('whitelist.destroy', $content->id) }}" method="POST">
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger">Delete mm</button>
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
