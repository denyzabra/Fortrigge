<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Fortrigge PMS</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
        <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css')}}" type="text/css" />
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    </head>

<body>
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

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li>
                                <a href="#">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            <!-- Property management section -->
                            <li class="menu-title mt-2" data-key="t-components">Property Management</li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="grid"></i>
                <span data-key="t-apps">Property</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('properties.index')}}" data-key="t-view-properties">View Properties</a></li>
                <li><a href="{{ route('properties.create')}}" data-key="t-add-property">Add New Property</a></li>
                <!-- <li><a href="#" data-key="t-edit-property">Edit Property</a></li> -->
            </ul>
        </li>

        <!-- land section -->
        <!-- <li class="menu-title mt-2" data-key="t-components">Land</li> -->
        <!-- <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="map"></i>
                <span data-key="t-land">Land Types</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-farm-land">Farm Land</a></li>
                <li><a href="#" data-key="t-commercial-land">Commercial Land</a></li>
                <li><a href="#" data-key="t-residential-land">Residential Land</a></li>
            </ul>
        </li> -->

                             <!-- Housing Section -->
        <!-- <li class="menu-title mt-2" data-key="t-components">Housing</li> -->
        <!-- <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="home"></i>
                <span data-key="t-housing">Housing Types</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="javascript: void(0);" class="has-arrow" data-key="t-apartment">Apartment</a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-furnished-apartment">Furnished</a></li>
                        <li><a href="#" data-key="t-unfurnished-apartment">Unfurnished</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" data-key="t-townhouse">Town House</a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-furnished-townhouse">Furnished</a></li>
                        <li><a href="#" data-key="t-unfurnished-townhouse">Unfurnished</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(0);" class="has-arrow" data-key="t-bungalow">Bungalow</a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-furnished-bungalow">Furnished</a></li>
                        <li><a href="#" data-key="t-unfurnished-bungalow">Unfurnished</a></li>
                    </ul>
                </li>
            </ul>
        </li> -->

          <!-- Tenant Management Section -->
          <!-- <li class="menu-title mt-2" data-key="t-components">Tenant Management</li> -->
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                <span data-key="t-tenants">Tenants</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('tenants.index') }}" data-key="t-tenant-list">Tenant List</a></li>
            <li><a href="{{ route('tenants.create') }}" data-key="t-add-tenant">Add New Tenant</a></li>
            <li><a href="#" data-key="t-tenant-details">Tenant Details</a></li>

            </ul>
        </li>

          <!-- Lease Management Section -->
          <!-- <li class="menu-title mt-2" data-key="t-components">Lease Management</li> -->
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="file-text"></i>
                <span data-key="t-leases">Leases</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-lease-agreements">Lease Agreements</a></li>
                <li><a href="#" data-key="t-add-lease">Add New Lease</a></li>
                <li><a href="#" data-key="t-lease-details">Lease Details</a></li>
            </ul>
        </li>


         <!-- Maintenance Requests Section -->
         <!-- <li class="menu-title mt-2" data-key="t-components">Maintenance Requests</li> -->
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="tool"></i>
                <span data-key="t-maintenance">Requests</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-submitted-requests">Submitted Requests</a></li>
                <li><a href="#" data-key="t-task-management">Task Management</a></li>
                <li><a href="javascript: void(0);" class="has-arrow" data-key="t-service-providers">Service Providers</a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-electricians">Electricians</a></li>
                        <li><a href="#" data-key="t-plumbers">Plumbers</a></li>
                        <li><a href="#" data-key="t-cleaners">Cleaners</a></li>
                    </ul>
                </li>
            </ul>
        </li>


         <!-- Document Management Section -->
         <!-- <li class="menu-title mt-2" data-key="t-components">Document Management</li> -->
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="folder"></i>
                <span data-key="t-documents">Documents</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('documents.index', ['type' => 'property']) }}" data-key="t-property-documents">Property Documents</a></li>
                <li><a href="{{ route('documents.index', ['type' => 'lease']) }}" data-key="t-lease-agreements-docs">Lease Agreements</a></li>
                <li><a href="{{ route('documents.index', ['type' => 'maintenance']) }}" data-key="t-maintenance-records">Maintenance Records</a></li>
                <li><a href="{{ route('documents.index', ['type' => 'lc']) }}" data-key="t-lc-letters">LC Letters</a></li>
                <li><a href="{{ route('documents.index', ['type' => 'biodata']) }}" data-key="t-biodata">Bio-data: Work Info</a></li>
            </ul>
        </li>

           <!-- Financial Management Section -->
           <li class="menu-title mt-2" data-key="t-components">Financial Management</li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="dollar-sign"></i>
                <span data-key="t-finance">Finance</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-financial-reports">Financial Reports</a></li>
                <li><a href="javascript: void(0);" class="has-arrow" data-key="t-invoices">Invoices</a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-generate-invoice">Generate Invoice</a></li>
                        <li><a href="#" data-key="t-view-unpaid-invoices">View Unpaid Invoices</a></li>
                        <li><a href="#" data-key="t-invoice-history">Invoice History</a></li>
                    </ul>
                </li>
                <li><a href="#" data-key="t-income">Income</a></li>
                <li><a href="#" data-key="t-expenses">Expenses</a></li>
                <li><a href="#" data-key="t-receipts">Receipts</a></li>
            </ul>
        </li>

          <!-- Vacancy Management Section -->
          <!-- <li class="menu-title mt-2" data-key="t-components">Vacancy Management</li> -->
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="eye"></i>
                <span data-key="t-vacancies">Vacancies</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-vacant-properties">Vacant Properties</a></li>
                <li><a href="#" data-key="t-rental-history">Rental History</a></li>
            </ul>
        </li>

         <!-- Task Automation Section -->
         <!-- <li class="menu-title mt-2" data-key="t-components">Task Automation</li> -->
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="clock"></i>
                <span data-key="t-automation">Automation</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-scheduled-tasks">Scheduled Tasks</a></li>
                <li><a href="#" data-key="t-task-history">Task History</a></li>
            </ul>
        </li>

         <!-- Booking Features Section -->
         <!-- <li class="menu-title mt-2" data-key="t-components">Booking Features</li> -->
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="calendar"></i>
                <span data-key="t-bookings">Bookings</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-client-bookings">Client Bookings</a></li>
                <li><a href="#" data-key="t-client-needs">Client Needs and Complaints</a></li>
                <li><a href="#" data-key="t-rent-payment-reminders">Rent Payment Reminders</a></li>
                <!-- <li><a href="#" data-key="t-auto-receipt-generation">Automatic Receipt Generation</a></li> -->
            </ul>
        </li>


          <!-- Communication Tools Section -->
          <!-- <li class="menu-title mt-2" data-key="t-components">Communication Tools</li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="message-square"></i>
                <span data-key="t-communication">Communication</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-inbox">Inbox</a></li>
                <li><a href="#" data-key="t-notifications">Notifications</a></li>
                <li><a href="#" data-key="t-announcements">Announcements</a></li>
                <li><a href="#" data-key="t-client-complaints">Client Complaints</a></li>
            </ul>
        </li> -->

<!-- User Management & Settings Section -->
<li class="menu-title mt-2" data-key="t-components">User Management & Settings</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i data-feather="users"></i>
        <span data-key="t-user-management">Roles & Permissions</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('users.index') }}" data-key="t-manage-users">Manage Users</a></li>
        <li><a href="{{ route('roles.index') }}" data-key="t-assign-roles">Assign Roles</a></li>
        <li><a href="{{ route('permissions.index') }}" data-key="t-set-permissions">Set Permissions</a></li>
    </ul>
    <!-- </ul> -->
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i data-feather="settings"></i>
        <span data-key="t-settings">Settings</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
    <li><a href="{{ route('profile') }}" data-key="t-profile">Profile</a></li>
<li><a href="{{ route('lock-screen') }}" data-key="t-lock-screen">Lock Screen</a></li>
<li><a href="{{ route('security-setting.index') }}" data-key="t-security-settings">Security Settings</a></li>

    </ul>
</li>
</ul>
</ul>
</div>
                    <!-- Sidebar -->
</div>
</div>
            <!-- Left Sidebar End -->


            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                       <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Properties</span>
                        <h4 class="mb-3">
                            {{-- <span class="counter-value" data-target="0">0</span> --}}
                            {{-- <span class="counter-value" data-target="{{ $propertyCount }}">{{ $propertyCount }}</span> --}}
                        </h4>
                    </div>
                    <div class="col-6">
                        <!-- Mini-chart or relevant data visualization -->
                        <!-- <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div> -->
                    </div>
                </div>
                <div class="text-nowrap">
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Tenants</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="0">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <!-- Mini-chart or relevant data visualization -->
                        <!-- <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div> -->
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- Optional badges or additional info -->
                    <!-- <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                    <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Properties</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="0">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <!-- Mini-chart or relevant data visualization -->
                        <!-- <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div> -->
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- Optional badges or additional info -->
                    <!-- <span class="badge bg-soft-success text-success">+ $2.8k</span>
                    <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Units</span>
                        <h4 class="mb-3">
                            <span class="counter-value" data-target="0">0</span>
                        </h4>
                    </div>
                    <div class="col-6">
                        <!-- Mini-chart or relevant data visualization -->
                        <!-- <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div> -->
                    </div>
                </div>
                <div class="text-nowrap">
                    <!-- Optional badges or additional info -->
                    <!-- <span class="badge bg-soft-success text-success">+2.95%</span>
                    <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>

<div class="row">
    <div class="col-xl-6">
        <!-- Example Chart: Property Overview -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <h5 class="card-title">Property Overview</h5>
                <div id="property-overview-chart" data-colors='["#5156be", "#34c38f"]' class="apex-charts"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <!-- Example Chart: Tenant Overview -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <h5 class="card-title">Tenant Overview</h5>
                <div id="tenant-overview-chart" data-colors='["#34c38f", "#f46a6a"]' class="apex-charts"></div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-6">
        <!-- Announcements -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <h5 class="card-title">Announcements</h5>
                <ul class="list-unstyled">
                    <li><i class="mdi mdi-calendar-check me-2 text-success"></i> Property inspections scheduled for next week.</li>
                    <li><i class="mdi mdi-calendar-check me-2 text-success"></i> Rent payment due by the end of this month.</li>
                    <li><i class="mdi mdi-calendar-check me-2 text-success"></i> Maintenance work planned for the following weekend.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <!-- Calendar & Rent Reminders -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <h5 class="card-title">Tasks & Rent Reminders</h5>
                <div id="calendar"></div> <!-- Placeholder for a calendar widget -->

                <!-- Rent Reminders -->
                <div class="mt-4">
                    <h6 class="text-muted">Upcoming Rent Reminders</h6>
                    <ul class="list-unstyled">
                        <li><i class="mdi mdi-calendar-clock me-2 text-danger"></i> John Doe's rent payment due on 15th August.</li>
                        <li><i class="mdi mdi-calendar-clock me-2 text-danger"></i> Jane Smith's rent payment overdue since 5th August.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



                <!-- footer start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Fortrigge.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                    <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
    
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{('assets/libs/feather-icons/feather.min.js')}}"></script>
        <!-- pace js -->
        <script src="{{('assets/libs/pace-js/pace.min.js')}}"></script>
        <!-- apexcharts -->
        <script src="{{('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <!-- Plugins js-->
        <script src="{{('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- dashboard init -->
        <script src="{{('assets/js/pages/dashboard.init.js')}}"></script>
        <script src="{{('assets/js/app.js')}}"></script>
        <script>
    let timeout;

    function startTimer() {
        // Set timeout to 5 minutes (300000 milliseconds)
        timeout = setTimeout(function() {
            window.location.href = '{{ route('lock-screen') }}';
        }, 300000); // 5 minutes
    }

    function resetTimer() {
        clearTimeout(timeout);
        startTimer();
    }

    window.onload = startTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
</script>

    </body>
</html>
@yield('content')