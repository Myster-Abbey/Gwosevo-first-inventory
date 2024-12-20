@extends('layouts.auth')

@section('pageTitle', 'Change Password')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            {{-- @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif --}}

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Change Password</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row ">
                <div class="col-lg-12">
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            {{-- <label for="new-password" class="col-md-4 control-label">Current Password</label> --}}
                            <label for="current-password" class="form-label">Current Password<span class="text-danger">*</span></label>

                            <div class="col-md-12 mb-3">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            {{-- <label for="new-password" class="col-md-4 control-label">New Password</label> --}}
                            <label for="new-password" class="form-label">New Password<span class="text-danger">*</span></label>

                            <div class="col-md-12 mb-3">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                {{-- @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label> --}}
                            <label for="new-password-confirm" class="form-label">Confirm New Password<span class="text-danger">*</span></label>

                            <div class="col-md-12 mb-3">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-primary" id="add-btn">Change Password</button>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div> --}}
                    </form>

                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
@endsection
