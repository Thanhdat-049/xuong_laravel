<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('default/assets/images/favicon.ico') }}">

    @yield('style-libs')
    @yield('style')

    <!-- Layout config Js -->
    <script src="{{ asset('default/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('default/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('default/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('default/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('default/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.layout.header')

        <!-- removeNotificationModal -->

        <!-- ========== App Menu ========== -->
        @include('admin.layout.sidebar')
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                @yield('content')

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->

                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('admin.layout.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <script>
        const PATH_ROOT = '{{ asset('default') }}';
        console.log(PATH_ROOT);
    </script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('default/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('default/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('default/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('default/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('default/assets/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    @yield('script-libs')
    @yield('script')
    <!-- App js -->
    <script src="{{ asset('default/assets/js/app.js') }}"></script>
</body>

</html>
