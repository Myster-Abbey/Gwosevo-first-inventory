@extends('layouts.auth')

@section('pageTitle', 'Users')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b>{{ session('success') }}</b>, a new Administrator created successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- list of users --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="contactList">
                        @if (Auth::check())
                            @if (Auth::user()->role == 'Super Administrator')
                                <div class="card-header">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-md-auto col-6 text-end">
                                            <div class="d-flex flex-wrap align-items-start gap-2">
                                                <button class="btn btn-subtle-danger d-none" id="remove-actions"
                                                    onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>

                                                <a href="{{ route('show-user') }}"><button
                                                        class="btn btn-secondary add-btn"><i
                                                            class="bi bi-house align-baseline me-1"></i>
                                                        Add
                                                        User
                                                    </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif


                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1"
                                    class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" class="sort cursor-pointer" data-sort="id">ID</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="name">Name</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="email">Email</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="role">Role</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="date_created">Date
                                                Created
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @forelse ($users as $user)
                                            <tr>
                                                <td class="id">{{ $user->id }}</td>
                                                <td class="name">{{ $user->name }}</td>
                                                <td class="email">{{ $user->email }}</td>
                                                <td class="role">{{ $user->role }}</td>
                                                <td class="created_at">{{ $user->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

        </div>
        <!-- container-fluid `-->
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
