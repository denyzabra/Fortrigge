<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Fortrigge PMS</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css') }}" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>
<body>
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
                <li><a href="#" data-key="t-edit-property">Edit Property</a></li>
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
        <!-- <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="file-text"></i>
                <span data-key="t-leases">Leases</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#" data-key="t-lease-agreements">Lease Agreements</a></li>
                <li><a href="#" data-key="t-add-lease">Add New Lease</a></li>
                <li><a href="#" data-key="t-lease-details">Lease Details</a></li>
            </ul>
        </li> -->


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



                            
                                 <!-- <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="box"></i>
                                    <span class="badge rounded-pill bg-soft-danger text-danger float-end">7</span>
                                    <span data-key="t-forms">Forms</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="form-elements.html" data-key="t-form-elements">Basic Elements</a></li>
                                    <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>
                                    <li><a href="form-advanced.html" data-key="t-form-advanced">Advanced Plugins</a></li>
                                    <li><a href="form-editors.html" data-key="t-form-editors">Editors</a></li>
                                    <li><a href="form-uploads.html" data-key="t-form-upload">File Upload</a></li>
                                    <li><a href="form-wizard.html" data-key="t-form-wizard">Wizard</a></li>
                                    <li><a href="form-mask.html" data-key="t-form-mask">Mask</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="sliders"></i>
                                    <span data-key="t-tables">Tables</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tables-basic.html" data-key="t-basic-tables">Bootstrap Basic</a></li>
                                    <li><a href="tables-datatable.html" data-key="t-data-tables">DataTables</a></li>
                                    <li><a href="tables-responsive.html" data-key="t-responsive-table">Responsive</a></li>
                                    <li><a href="tables-editable.html" data-key="t-editable-table">Editable</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="pie-chart"></i>
                                    <span data-key="t-charts">Charts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="charts-apex.html" data-key="t-apex-charts">Apexcharts</a></li>
                                    <li><a href="charts-echart.html" data-key="t-e-charts">Echarts</a></li>
                                    <li><a href="charts-chartjs.html" data-key="t-chartjs-charts">Chartjs</a></li>
                                    <li><a href="charts-knob.html" data-key="t-knob-charts">Jquery Knob</a></li>
                                    <li><a href="charts-sparkline.html" data-key="t-sparkline-charts">Sparkline</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="cpu"></i>
                                    <span data-key="t-icons">Icons</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="icons-boxicons.html" data-key="t-boxicons">Boxicons</a></li>
                                    <li><a href="icons-materialdesign.html" data-key="t-material-design">Material Design</a></li>
                                    <li><a href="icons-dripicons.html" data-key="t-dripicons">Dripicons</a></li>
                                    <li><a href="icons-fontawesome.html" data-key="t-font-awesome">Font Awesome 5</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="map"></i>
                                    <span data-key="t-maps">Maps</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="maps-google.html" data-key="t-g-maps">Google</a></li>
                                    <li><a href="maps-vector.html" data-key="t-v-maps">Vector</a></li>
                                    <li><a href="maps-leaflet.html" data-key="t-l-maps">Leaflet</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="share-2"></i>
                                    <span data-key="t-multi-level">Multi Level</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                            <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
 
                        </ul>
                            </ul>

                       
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
                <!-- Left Menu End -->
            </div>
        </div>
    </div>
    <!-- ========== Left Sidebar End ========== -->
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


    <!-- Include your JavaScript libraries -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.2/js/buttons.print.min.js"></script>

    @yield('scripts')
</body>
</html>
