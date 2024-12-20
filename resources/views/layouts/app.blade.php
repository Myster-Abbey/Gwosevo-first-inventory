<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    @section('pageTitle', 'Login')
    @include('layouts.partials.head')
</head>

<body>
    <section class="auth-page-wrapper position-relative d-flex align-items-center justify-content-center vh-100"
        style="background-image: url('{{ asset('assets/images/') }}'); background-size: contain;">

        <div class="container">
            <div class="row justify-content-center align-items-center">
                {{-- <div class="col-md-5 d-flex justify-content-center d-none d-md-flex g-0">
                    <img src="{{ asset('assets/images/logo/back01.jpg') }}" class="img-fluid" alt="Left Image"
                        style="max-height: 100vh; width:100%">
                </div> --}}
                <div class="col-md-6">
                    <div class="card mb-0 border-0 shadow-none mb-0">
                        <div class="card-body p-sm-5 m-lg-4">
                            <div class="text-center mt-2">
                                <h5 class="fs-3xl">Projects Statistics</h5>
                                <p class="text-muted">Projects Details</p>
                            </div>
                            <div class="p-2 mt-2">
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
                                        <label for="email" class="form-label">{{ __('Email Address') }}
                                            <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="email" value="{{ old('email') }}" id="email"
                                                name="email" class="form-control password-input"
                                                placeholder="Enter email" required />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password
                                            <span class="text-danger">*</span></label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input"
                                                name="password" placeholder="Enter password" id="password-input"
                                                required />
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon">
                                                <i class="ri-eye-fill align-middle"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="{{ old('remember') ? 'checked' : '' }}" id="auth-remember-check" />
                                        <label class="form-check-label" for="auth-remember-check">Remember
                                            me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-primary w-100" type="submit">
                                            Sign In
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
                {{-- <div class="col-md-4 d-flex justify-content-center d-none d-md-flex">
                    <img src="{{ asset('assets/images/logo/back01.jpg') }}" class="img-fluid" alt="Right Image"
                        style="max-height: 90vh;">
                </div> --}}
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    <!-- JAVASCRIPT -->
    @include('layouts.partials.script')
</body>

</html>
