@extends('layout')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start Page Title -->
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
            <!-- End Page Title -->

            <!-- Dashboard Cards -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Properties</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="0">0</span>
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <!-- Mini-chart or relevant data visualization -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-h-100">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-h-100">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-h-100">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Example Charts -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <h5 class="card-title">Property Overview</h5>
                            <div id="property-overview-chart" data-colors='["#5156be", "#34c38f"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <h5 class="card-title">Tenant Overview</h5>
                            <div id="tenant-overview-chart" data-colors='["#34c38f", "#f46a6a"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements and Reminders -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-h-100">
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
                    <div class="card card-h-100">
                        <div class="card-body">
                            <h5 class="card-title">Tasks & Rent Reminders</h5>
                            <div id="calendar"></div> <!-- Placeholder for a calendar widget -->

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

        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- ApexCharts JS -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Counter Up JS -->
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.js') }}"></script>
    <!-- Custom JS for dashboard -->
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
@endpush
