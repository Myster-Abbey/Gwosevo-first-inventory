@extends('layouts.app')

@section('content')
    <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="card mb-0">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-5">
                                <div class="card auth-card bg-secondary h-100 border-0 shadow-none d-none d-sm-block mb-0">
                                    <div class="card-body py-5 d-flex justify-content-between flex-column">

                                        <div
                                            class="auth-effect-main my-5 position-relative rounded-circle d-flex align-items-center justify-content-center mx-auto">
                                            <div
                                                class="effect-circle-1 position-relative mx-auto rounded-circle d-flex align-items-center justify-content-center">
                                                <div
                                                    class="effect-circle-2 position-relative mx-auto rounded-circle d-flex align-items-center justify-content-center">
                                                    <div
                                                        class="effect-circle-3 mx-auto rounded-circle position-relative text-white fs-4xl d-flex align-items-center justify-content-center">
                                                        Welcome to <span class="text-primary ms-1">Dentsu Promo</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <p class="text-white opacity-75 mb-0 mt-3">
                                                &copy;
                                                <script>
                                                    document.write(new Date().getFullYear())
                                                </script>. Crafted
                                                with <i class="mdi mdi-heart text-danger"></i> by <a
                                                    href="https://www.txtghana.com/">Txt Ghana Limited.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6 mx-auto">
                                <div class="card mb-0 border-0 shadow-none mb-0">
                                    <div class="card-body p-sm-5 m-lg-4">
                                        <div class="text-center mt-5">
                                            <h5 class="fs-3xl">Create your free account</h5>
                                        </div>
                                        <div class="p-2 mt-5">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">{{ __('Email Address') }} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="position-relative ">
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            password-input" value="{{ old('email') }}" id="email"
                                                            name="email" autocomplete="email" placeholder="Enter email"
                                                            required>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">{{ __('Username') }} <span
                                                            class="text-danger">*</span></label>
                                                    <div class="position-relative ">
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            password-input" value="{{ old('name') }}" id="name"
                                                            name="name" autocomplete="username"
                                                            placeholder="Enter username" required>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="role" class="form-label">{{ __('Role') }} <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="position-relative ">
                                                    <select class="form-select" id="role" data-choices
                                                        data-choices-search-false name="role">
                                                        <option selected disabled>Role Type</option>
                                                        <option value="Super Administrator">Super Administrator</option>
                                                        <option value="Administrator">Administrator</option>
                                                    </select>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">{{ __('Password') }}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" @error('password') is-invalid @enderror"
                                                            class="form-control pe-5 password-input" name="password"
                                                            placeholder="Enter password" value="{{ old('password') }}"
                                                            id="password-input" autocomplete="password" required>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            </span>
                                                        @enderror
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        for="password-input">{{ __('Confirm Password') }}
                                                        <span class="text-danger">*</span></label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" name="password_confirmation"
                                                            @error('password_confirmation') is-invalid @enderror"
                                                            class="form-control pe-5 password-input "
                                                            placeholder="Confirm password" id="password-confirm"
                                                            autocomplete="password"
                                                            value="{{ old('password_confirmation') }}" required>
                                                        @error('password_confirmation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            </span>
                                                        @enderror
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100"
                                                        type="submit">{{ __('Sign Up') }}</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <p class="mb-0">Already have an account ? <a href="/"
                                                            class="fw-semibold text-primary text-decoration-underline">
                                                            Sign In </a> </p>
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
