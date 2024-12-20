@extends('layouts.auth')

@section('pageTitle', 'Add User')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create User</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row ">
                <div class="col-lg-12">
                    <form class="tablelist-form" autocomplete="on" method="POST" action="{{ route('create-user') }}">
                        @csrf
                        <div class="modal-body">
                            <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                            <input type="hidden" id="name">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name"
                                    class="form-control
                                    @error('name') is-invalid @enderror"
                                    placeholder="Enter Full Name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="alert alert-danger invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="role" class="form-label @error('role') is-invalid @enderror">Role Type<span
                                        class="text-danger">*</span></label>

                                <select class="form-select" id="role" aria-label="Role" name="role">
                                    <option selected disabled>Select Role Type</option>
                                    <option value="Super Administrator">Super Administrator</option>
                                    <option value="Administrator">Administrator</option>
                                </select>
                                @error('role')
                                    <span class="alert alert-danger invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Enter Email" required>
                                @error('email')
                                    <span class="alert alert-danger invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control
                                    @error('password') is-invalid @enderror"
                                    placeholder="Enter Password" required autocomplete="new-password">
                                @error('password')
                                    <span class="alert alert-danger invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm Password<span
                                        class="text-danger">*</span></label>
                                <input type="password" id="password-confirm" class="form-control"
                                    name="password_confirmation" placeholder="Enter Confirm Password" required
                                    autocomplete="new-password">

                            </div>

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary" id="add-btn">Save User</button>
                                </div>
                            </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection
