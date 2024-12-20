<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark"
    data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light"
    data-layout-width="fluid">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <div id="layout-wrapper">
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">

            {{-- logo --}}
            <div class="navbar-brand-box">
                <a href="/home" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="" height="50"
                            class="img-fluid">
                    </span>
                    {{-- <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="" height="80"
                            width="100" class="img-fluid"></span> --}}
                </a>
                <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            {{-- sidemenu --}}
            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">

                        {{-- Dashboard --}}
                        <li class="menu-title"><span data-key="t-menu">Home</span></li>

                        {{-- Home --}}
                        <li class="nav-item active">
                            <a class="nav-link menu-link {{ request()->is('home') ? 'active' : '' }}" href="/home">
                                <i class="ph-gauge"></i> <span data-key="t-dashboards">Dashboard</span>
                            </a>
                        </li>

                        {{-- Statistics --}}
                        {{-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-apps">Statistics</span>
                        </li> --}}

                        <!-- Balances -->
                        @if (Auth::check())
                            @if (Auth::user()->role == 'Super Administrator')

                            @endif
                        @endif


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('whitelist') ? 'active' : '' }}" href="{{ route('whitelist.index')}}">
                                <i class="ph-check-circle"></i> <span data-key="t-whitelist">USSD</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('web') ? 'active' : '' }}" href="{{route('web.index')}}">
                                <i class="ph-check-circle"></i> <span data-key="t-web">Web Applications</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('mobile') ? 'active' : '' }}" href="{{route('mobile.index')}}">
                                <i class="ph-check-circle"></i> <span data-key="t-mobile">Mobile Applications</span>
                            </a>
                        </li>


                        @if (Auth::check())
                            @if (Auth::user()->role == 'Super Administrator')
                                {{-- Settings --}}
                                <li class="menu-title"><i class="ri-more-fill"></i> <span
                                        data-key="t-pages">Settings</span>
                                </li>

                                <!-- Manage Users -->
                                <li class="nav-item">
                                    <a class="nav-link menu-link collapsed {{ request()->is('users') ? 'active' : '' }}"
                                        href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                                        aria-expanded="{{ request()->is('users') ? 'true' : 'false' }}"
                                        aria-controls="sidebarAuth" id="manageUsers">
                                        <i class="ph-user-circle"></i> <span data-key="t-authentication">Manage
                                            Users</span>
                                    </a>
                                    <div class="collapse menu-dropdown {{ request()->is('users') ? 'show' : '' }}"
                                        id="sidebarAuth">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="/users"
                                                    class="nav-link {{ request()->is('users') ? 'active' : '' }}"
                                                    role="button" data-key="t-signin">User List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        @endif

                        <!-- Logout -->
                        <li class="nav-item mt-5">
                            <a class="nav-link" href="/logout"
                                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                <i class="ph-gauge"></i>
                                <span data-key="t-dashboards">Logout</span>
                            </a>
                        </li>
                        <form id="logout-form" method="POST" action="/logout">
                            @csrf
                        </form>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>)

        </div>

        {{-- header --}}
        <header id="page-topbar">
            @include('layouts.partials.topbar')
        </header>

        {{-- Start Page Content here --}}

        {{-- Start right Content here --}}
        <div class="main-content">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @yield('content')

            {{-- footer --}}
            @include('layouts.partials.footer')
        </div>
    </div>

    {{-- back to top --}}
    <button class="btn btn-dark btn-icon" id="back-to-top">
        <i class="bi bi-caret-up fs-3xl"></i>
    </button>

    {{-- preloader --}}
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    @include('layouts.partials.script')
</body>

</html>
