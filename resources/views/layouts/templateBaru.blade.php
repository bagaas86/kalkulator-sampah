<!DOCTYPE html>
<html lang="en">

<head>
    <title>KALKULATOR BANK SAMPAH</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <link rel="icon" href="{{ asset('template') }}/dist/assets/images/logoPolsub.png">

    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/assets/css/plugins/prism-coy.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/assets/css/style.css">

    {{-- bootstrap icons --}}
    <link href="{{ asset('template') }}/dist/assets/js/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    {{-- Ajax JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
        @include('layouts.navBaru')
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="container">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    {{-- <img src="{{ asset('template') }}/dist/assets/images/logoBMNPOLSUB.png" style="width:200px"
                        alt="" class="logo">
                    <img src="{{ asset('template') }}/dist/assets/images/logo-icon.png" alt=""
                        class="logo-thumb"> --}}
                </a>
                <a href="#!" class="mob-toggler">
                    <i class="feather icon-more-vertical"></i>
                </a>
            </div>
            @auth
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <div class="dropdown drp-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img class="img-radius" src="{{ asset('template') }}/dist/assets/images/default.png"
                                        style="width:40px;height:40px;">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-notification">
                                    <div class="pro-head">
                                        @php
                                            $kata = explode(' ', Auth::user()->name);
                                            $hasil = $kata[0];
                                        @endphp
                                        <img src="{{ asset('template') }}/dist/assets/images/default.png" class="img-radius"
                                            style="width:40px;height:40px;" alt="User-Profile-Image">
                                        <span>{{ $hasil }}</span>

                                        <a class="dud-logout" href="{{ route('user.logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="feather icon-log-out m-r-5"></i>
                                        </a>
                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                                            @csrf
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                @yield('navigasi')
                            </div>
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ horizontal-layout ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                                <!-- [ horizontal-layout ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade
                   <br/>to any of the following web browsers to access this website.
                </p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="{{ asset('template') }}/dist/assets/images/browser/chrome.png" alt="Chrome">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="{{ asset('template') }}/dist/assets/images/browser/firefox.png" alt="Firefox">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="{{ asset('template') }}/dist/assets/images/browser/opera.png" alt="Opera">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="{{ asset('template') }}/dist/assets/images/browser/safari.png" alt="Safari">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="{{ asset('template') }}/dist/assets/images/browser/ie.png" alt="">
                                <div>IE (11 & above)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="{{ asset('template') }}/dist/assets/js/vendor-all.min.js"></script>
    <script src="{{ asset('template') }}/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('template') }}/dist/assets/js/ripple.js"></script>
    <script src="{{ asset('template') }}/dist/assets/js/pcoded.min.js"></script>


    <!-- prism Js -->
    <script src="{{ asset('template') }}/dist/assets/js/plugins/prism.js"></script>





    <script src="{{ asset('template') }}/dist/assets/js/horizontal-menu.js"></script>
    <script>
        (function() {
            if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
                return;
            }
            try {
                window.layoutHelpers._getSetting("Rtl")
                window.layoutHelpers.setCollapsed(
                    localStorage.getItem('layoutCollapsed') === 'true',
                    false
                );
            } catch (e) {}
        })();
        $(function() {
            $('#layout-sidenav').each(function() {
                new SideNav(this, {
                    orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
                });
            });
            $('body').on('click', '.layout-sidenav-toggle', function(e) {
                e.preventDefault();
                window.layoutHelpers.toggleCollapsed();
                if (!window.layoutHelpers.isSmallScreen()) {
                    try {
                        localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                    } catch (e) {}
                }
            });
        });
        $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                themelayout: 'horizontal',
                MenuTrigger: 'hover',
                SubMenuTrigger: 'hover',
            });
        });
    </script>

    <script src="{{ asset('template') }}/dist/assets/js/analytics.js"></script>

</body>

</html>
