<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Fortrigge PMS</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" />
    <!-- Include any other CSS files you need -->
</head>
<body>
    <div id="layout-wrapper">
        
        <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <!-- Logo and other header content -->
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="{{ route('dashboard') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="" height="24">
                                <span class="logo-txt" style="color: #f1a886">Fortrigge</span>
                            </span>
                        </a>
                        <a href="{{ route('dashboard') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/fortrigge icon.png') }}" alt="" height="24">
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
                            <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </form>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/' . (Auth::user()->profile_picture ?? 'default.jpg')) }}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('profile') }}"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('lock-screen') }}"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a>
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
        
        @extends('layout.sidebar')


        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page Title -->
                    <div class="row">
                        <div class="col-12">
                            <h1 class="page-title">Profile</h1>
                        </div>
                    </div>
                    
                    <!-- Profile Form -->
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-3 col-form-label">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <label for="profile_picture" class="col-md-3 col-form-label">Profile Picture</label>
                                            <div class="col-md-9">
                                                <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                                                @if($user->profile_picture)
                                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="150">
                                                @endif
                                                @error('profile_picture')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <div class="col-md-9 offset-md-3">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Include any JavaScript files you need -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
