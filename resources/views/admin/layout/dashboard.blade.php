<!DOCTYPE html>

<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="../../assets/" data-template="vertical-menu-template-semi-dark">

  
<!--  , Sat, 26 Mar 2022 16:44:24 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - CRM | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    
    {{-- CSRF Token For Ajax --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/rtl/theme-semi-dark.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />

    <!-- Page CSS -->
    
    <!-- Helpers -->
    <script src="{{ URL::asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.  -->
    <script src="{{ URL::asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ URL::asset('assets/js/config.js') }}"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">

<body style="font-family: 'Almarai', sans-serif;">

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme "
                style="background-color: #111 !important;">

                <div class="app-brand demo mb-3  ">
                    <a href='' class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('images/logok.png') }}" width=200>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>


                <div class="menu-inner-shadow"></div>



                <ul class="menu-inner py-1 ">

                    <!-- Apps & Pages -->
                    @if (auth()->user()->hasRole('super_admin') || 
                    auth()->user()->isAbleTo('all_dashboard'))
                        <li class="menu-item">
                            <a href="{{ route('users') }}" class="menu-link">
                                <i class='menu-icon tf-icons bx bx-user'></i>
                                <div>ادارة المستخدمين</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->hasRole('super_admin') ||
                        auth()->user()->isAbleTo('all_dashboard') ||
                        auth()->user()->isAbleTo('manage_services'))
                        <li class="menu-item ">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-copy"></i>
                                <div>ادارة الخدمات</div>
                            </a>
                            <ul class="menu-sub px-3">
                                <li class="menu-item ">
                                    <a href="{{ route('services') }}" class="menu-link">
                                        <div>الخدمات الرئيسية</div>
                                    </a>
                                </li>

                                <li class="menu-item ">
                                    <a href="{{ route('goals') }}" class="menu-link">
                                        <div> الاهداف</div>
                                    </a>
                                </li>

                                <li class="menu-item ">
                                    <a href="{{ route('financings') }}" class="menu-link">
                                        <div> التمويل</div>
                                    </a>
                                </li>

                                <li class="menu-item ">
                                    <a href="{{ route('volunteereds') }}" class="menu-link">
                                        <div> التطوع</div>
                                    </a>
                                </li>

                                <li class="menu-item ">
                                    <a href="{{ route('questions') }}" class="menu-link">
                                        <div> اسئلة شائعة</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('services') }}" class="menu-link">
                                <i class='menu-icon tf-icons bx bx-window-open'></i>
                                <div>ادارة الخدمات</div>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->hasRole('super_admin') ||
                        auth()->user()->isAbleTo('all_dashboard') ||
                        auth()->user()->isAbleTo('manage_content'))
                        <li class="menu-item">
                            <a href="{{route('projects')}}" class="menu-link">
                                <i class='menu-icon tf-icons bx bx-news'></i>
                                <div>ادارة المشاريع </div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('reports')}}" class="menu-link">
                                <i class='menu-icon tf-icons bx bx-chart'></i>
                                <div>ادارة التقارير </div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('contact_us')}}" class="menu-link">
                                <i class='menu-icon tf-icons bx bx-phone'></i>
                                <div>ادارة وسائل التواصل</div>
                            </a>
                        </li>

                        <li class="menu-item ">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-file"></i>
                                <div>ادارة معلومات الموقع</div>
                            </a>
                            <ul class="menu-sub px-3">
                                <li class="menu-item ">
                                    <a href="{{ route('website', 1) }}" class="menu-link">
                                        <div>عن البنك</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('website', 2) }}" class="menu-link">
                                        <div>الرؤيا</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('website', 3) }}" class="menu-link">
                                        <div>الرسالة</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('website', 4) }}" class="menu-link">
                                        <div>الاهداف</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('website', 5) }}" class="menu-link">
                                        <div>القيم والمبادئ</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
            </aside>
            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">





                <!-- Navbar -->




                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">











                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                    <i class="bx bx-search bx-sm"></i>
                                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                                </a>
                            </div>
                        </div>
                        <!-- /Search -->





                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <ul>
                                @if (app()->getLocale() != 'en')
                                    <li>
                                        <a rel="alternate" hreflang="en"
                                            href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                            En
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a rel="alternate" hreflang="ar"
                                            href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                            Ar
                                        </a>
                                    </li>
                                @endif
                            </ul>

                            <!-- Language -->
                            {{-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <i class='flag-icon flag-icon-us flag-icon-squared rounded-circle fs-3 me-1'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                                            <i
                                                class="flag-icon flag-icon-us flag-icon-squared rounded-circle fs-4 me-1"></i>
                                            <span class="align-middle">English</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            <!--/ Language -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" target="_blank">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->


                        </ul>
                    </div>


                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper  d-none">
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search...">
                        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                    </div>


                </nav>



                <!-- / Navbar -->
                <div class="content-wrapper">



                    <!-- Content wrapper -->
                    <div class="content-wrapper  mt-4">

                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            @yield('content')
                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    <!-- / Layout page -->
                </div>



                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>


                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>

            </div>
            <!-- / Layout wrapper -->

            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="{{ URL::asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
            <script src="{{ URL::asset('assets/vendor/libs/popper/popper.js') }}"></script>
            <script src="{{ URL::asset('assets/vendor/js/bootstrap.js') }}"></script>
            <script src="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

            <script src="{{ URL::asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
            <script src="{{ URL::asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
            <script src="{{ URL::asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

            <script src="{{ URL::asset('assets/vendor/js/menu.js') }}"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="{{ URL::asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

            <!-- Main JS -->
            <script src="{{ URL::asset('assets/js/main.js') }}"></script>

            <!-- Page JS -->
            <script src="{{ URL::asset('assets/js/dashboards-crm.js') }}"></script>


            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="{{ URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

            <!-- Page JS -->
            <script src="{{ URL::asset('assets/js/extended-ui-sweetalert2.js') }}"></script>


            <script src="{{ URL::asset('js/axios.min.js') }}"></script>
            <script src="{{ asset('js/functions.js') }}"></script>
            @yield('javaScript')
</body>


<!--  , Sat, 26 Mar 2022 16:46:23 GMT -->

</html>
