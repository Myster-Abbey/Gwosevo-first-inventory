@extends('layouts.auth')

@section('pageTitle', 'Add Blacklist')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <b>{{ session('error') }}</b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Blacklist</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row ">
                <div class="col-lg-12">
                    <form class="tablelist-form" autocomplete="on" method="POST" action="{{ route('blacklists.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                            <input type="hidden" id="name">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input type="text" id="name"
                                    class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                                    value="{{ old('full_name') }}" placeholder="Full Name">
                                @error('full_name')
                                    <span class="alert alert-danger invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="msisdn" class="form-label">Phone Number<span
                                        class="text-danger">*</span></label>
                                <input type="text" id="msisdn"
                                    class="form-control @error('msisdn') is-invalid @enderror" name="msisdn"
                                    value="{{ old('msisdn') }}" placeholder="E.g 024XXXXXXX" required>
                                @error('msisdn')
                                    <span class="alert alert-danger invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary" id="add-btn">Save</button>
                                </div>
                            </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection
