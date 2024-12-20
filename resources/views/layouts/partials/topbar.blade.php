<div class="layout-width">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
                {{-- <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="22">
                    </span>
                </a> --}}

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="22">
                    </span>
                </a>
            </div>

            <!-- Hambugger -->
            <button type="button"
                class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                id="topnav-hamburger-icon">
                <span class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>

        <!-- navigation menu -->
        <div class="d-flex align-items-center">

            <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        {{-- <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/user.jpg') }}"
                            alt="Header Avatar"> --}}
                        <span class="text-start ms-xl-2">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Welcome,
                                {{ Auth::user()->name }}
                            </span>
                        </span>
                    </span>
                </button>

                <!-- Profile Menu -->
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- Profile-->
                    <a class="dropdown-item" href="/profile"><i
                            class="mdi
                        mdi-account-circle text-muted fs-lg align-middle me-1"></i>
                        <span class="align-middle">Profile</span></a>

                    <a class="dropdown-item" href="/change-password"><i
                            class="mdi
                        mdi-lock text-muted fs-lg align-middle me-1"></i>
                        <span class="align-middle">Change Password</span></a>
                    <div class="dropdown-divider"></div>

                    <!-- Logout -->
                    <li>
                        <button class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-box-arrow-right"></i>
                            <a class="dropdown-item" href="/logout"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </button>

                        <form id="logout-form" method="POST" action="/logout">
                            @csrf
                        </form>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
