@extends('layouts.auth')

@section('pageTitle', 'Edit Profile')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->                     

            <div class="row ">
                <div class="col-lg-12">
                    <form class="tablelist-form" autocomplete="on" method="POST"
                        action="{{ route('profile.update', auth()->id()) }}">
                        @csrf
                        <div class="modal-body">
                            <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                            <input type="hidden" id="name">

                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ auth()->user()->name }}" autofocus="" required>
                                        <div class="invalid-tooltip">{{ trans('sentence.required') }}</div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input class="form-control" type="text" id="email" name="email"
                                            value="{{ auth()->user()->email }}" placeholder="john.doe@example.com">
                                        <div class="invalid-tooltip">{{ trans('sentence.required') }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary" id="add-btn">Update Profile</button>
                                </div>
                            </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection
