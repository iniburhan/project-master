<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="template/sneat/assets/" data-template="vertical-menu-template-free">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

        <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
        <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">

        <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-5DDHKGP');</script>
        <!-- End Google Tag Manager -->

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/fonts/boxicons.css')}}" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/fonts/fontawesome.css')}}" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/fonts/flag-icons.css')}}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/css/demo.css')}}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
        {{-- <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}"> --}}
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/animate-css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
        <!-- Row Group CSS -->
        {{-- <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}"> --}}
        <!-- Form Validation -->
        <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="{{asset('template/sneat/assets/vendor/js/helpers.js')}}"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        {{-- <script src="{{asset('template/sneat/assets/vendor/js/template-customizer.js')}}"></script> --}}
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{asset('template/sneat/assets/js/config.js')}}"></script>
    </head>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('layouts.sidebar')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('layouts.navbar')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        @yield('content')
                        <!-- / Content -->

                        <!-- Footer -->
                        @include('layouts.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <div class="buy-now">
            <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
        </div>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{asset('template/sneat/assets/vendor/libs/jquery/jquery.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/popper/popper.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/js/bootstrap.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/hammer/hammer.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/i18n/i18n.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/js/menu.js')}}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{asset('template/sneat/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
        {{-- <script src="{{asset('template/sneat/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script> --}}
        <script src="{{asset('template/sneat/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
        <!-- Flat Picker -->
        <script src="{{asset('template/sneat/assets/vendor/libs/moment/moment.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
        <!-- Form Validation -->
        <script src="{{asset('template/sneat/assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
        <script src="{{asset('template/sneat/assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>

        <!-- Main JS -->
        <script src="{{asset('template/sneat/assets/js/main.js')}}"></script>

        <!-- Page JS -->
        <script src="{{asset('template/sneat/assets/js/dashboards-analytics.js')}}"></script>
        <script src="{{asset('template/sneat/assets/js/ui-toasts.js')}}"></script>
        <script src="{{asset('template/sneat/assets/js/form-validation.js')}}"></script>
        {{-- <script src="{{asset('template/sneat/assets/js/ui-modals.js')}}"></script> --}}
        <script src="{{asset('template/sneat/assets/js/extended-ui-sweetalert2.js')}}"></script>
        {{-- <script src="{{asset('template/sneat/assets/js/tables-datatables-basic.js')}}"></script>
        <script src="{{asset('template/sneat/assets/js/tables-datatables-advanced.js')}}"></script> --}}

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>

