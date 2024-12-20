@extends('layouts.app')

@section('content')
    <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100"
        style="background-image: url('{{ asset('assets/images/nexans.jpg') }}'); background-size: cover;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mb-0">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-10 mx-auto">
                                <div class="card mb-0 border-0 shadow-none mb-0">
                                    <div class="card-body p-sm-5 m-lg-4">
                                        <div class="text-center mt-5">
                                            <h5 class="fs-3xl">Welcome To Calabash Color Festival</h5>
                                        </div>
                                        <div class="p-2 mt-5">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ url('login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">{{ __('Email Address') }} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="position-relative ">
                                                        <input type="email" class="form-control password-input"
                                                            value="{{ old('email') }}" id="email" name="email"
                                                            autocomplete="email" placeholder="Enter email" required
                                                            autofocus>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">{{ __('Password') }}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input"
                                                            name="password" placeholder="Enter password" id="password-input"
                                                            autocomplete="password" required>
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="auth-remember-check" value="true"
                                                        value="{{ old('remember') ? 'checked' : '' }}" />
                                                    <label class="form-check-label"
                                                        for="auth-remember-check">{{ __('Remember Me') }}</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100"
                                                        type="submit">{{ __('Sign In') }}</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
@endsection
