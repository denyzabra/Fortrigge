<!-- Header -->
<header id="page-topbar">
    <div class="navbar-header">
        <!-- Logo and Sidebar Toggle Button -->
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="Fortrigge Logo" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="Fortrigge Logo" height="24">
                        <span class="logo-txt" style="color: #f1a886">Fortrigge</span>
                    </span>
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="Fortrigge Logo" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="Fortrigge Logo" height="24">
                        <span class="logo-txt" style="color: #f1a886">Fortrigge</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button">
                        <i class="bx bx-search-alt align-middle"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- User Profile and Dropdown -->
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/' . (Auth::user()->profile_picture ?? 'default.jpg')) }}"
                        alt="User Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('lock-screen') }}">
                        <i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen
                    </a>
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->
