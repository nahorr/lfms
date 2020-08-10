<!doctype html>
<html lang="en" dir="ltr">
    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

        <!-- TITLE -->
        <title>Law Firm Managment System –  From Nahorr Analytics</title>

        <!-- BOOTSTRAP CSS -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet"/>

        <!-- INTERNAL SINGLE-PAGE CSS -->
        <link href="{{ asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet" type="text/css">

        <!-- CUSTOM SCROLL BAR CSS-->
        <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>

        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>

        <!-- SIDEBAR CSS -->
        <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

        <!-- INTERNAL SELECT2 CSS -->
        <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

        <!-- CUSTOM SCROLL BAR CSS-->
        <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>

        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>

    </head>

    <body>

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('/assets/images/loader.svg') }}" class="loader-img" alt="Law Firm Managment System">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">

            <div class="page-main">

                <!-- Header -->
                <div class="hor-header header">
                    <div class="container">
                        <div class="d-flex">
                            @auth
                                <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
                                <a class="header-brand" href="{{ url('/admin/home') }}">
                                    <img src="../../assets/images/brand/logo-3.png" class="header-brand-img mobile-icon" alt="logo">
                                    <img src="../../assets/images/brand/logo.png" class="header-brand-img desktop-logo mobile-logo" alt="logo">
                                </a>
                                @else
                                <a class="header-brand" href="{{ url('/') }}">
                                    <img src="../../assets/images/brand/logo-3.png" class="header-brand-img mobile-icon" alt="logo">
                                    <img src="../../assets/images/brand/logo.png" class="header-brand-img desktop-logo mobile-logo" alt="logo">
                                </a>
                            @endauth
                            <div class="d-flex ml-auto header-right-icons header-search-icon">
                                <!--For when user is Authenticated-->
                                @auth
                                    @include('layouts.partials.app.header.notifications')<!-- NOTIFICATIONS -->
                                    @include('layouts.partials.app.header.messagebox')<!-- MESSAGE-BOX -->
                                    @include('layouts.partials.app.header.profile')<!-- PROFILE -->
                                @else
                                    <!--For when user is Authenticated-->
                                        <!--Only Welcome Page-->
                                        @if(\Request::is('/'))
                                        <div class="ml-auto" style="margin-top: 10px;">
                                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary text-white mr-2">
                                                <span>
                                                    <i class="fe fe-lock"></i>
                                                </span><strong>Login</strong>
                                            </a>                          
                                            <a href="{{ route('registercompany') }}" class="btn btn-sm btn-secondary text-white">
                                                <span>
                                                    <i class="fe fe-user-plus"></i>
                                                </span><strong>Register</strong>
                                            </a>
                                        </div>
                                        @endif
                                    <!--/End Only Welcome Page-->

                                    <!--Login and Register Pages-->
                                        <div class="ml-auto" style="margin-top: 10px;">                                        
                                        @if((\Request::is('register_company')) || (\Request::is('register')))
                                          
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary text-white mr-2">
                                            <span>
                                                <i class="fe fe-lock"></i>
                                            </span><strong>Login</strong>
                                        </a> 
                                        @elseif(\Request::is('login'))
                                            @auth
                                            <a href="{{ url('/user/home') }}" class="btn btn-sm btn-primary text-white mr-2">
                                                <span>
                                                    <i class="fe fe-home"></i>
                                                </span><strong>Dashboard</strong>
                                            </a>
                                            @else                               
                                            <a href="{{ route('registercompany') }}" class="btn btn-sm btn-secondary text-white">
                                                <span>
                                                    <i class="fe fe-user-plus"></i>
                                                </span><strong>Register</strong>
                                            </a>
                                            @endauth
                                        
                                        @endif
                                        </div>
                                    <!--/Login and Register Pages-->  
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header -->

                <!--Content-area open-->
                <div class="content-area">
                    <div class="container">
                        @yield('content')
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>

            <!-- FOOTER -->
            @include('layouts.partials.app.footer')
            <!-- FOOTER CLOSED -->
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>

        <!-- SPARKLINE JS-->
        <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

        <!-- CHART-CIRCLE JS-->
        <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

        <!-- RATING STAR JS-->
        <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

        <!-- EVA-ICONS JS -->
        <script src="{{ asset('assets/iconfonts/eva.min.js') }}"></script>

        <!-- INPUT MASK JS-->
        <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

        <!--HORIZONTAL JS-->
        <script src="{{ asset('assets/plugins/horizontal-menu/horizontal-menu.js') }}"></script>

        <!-- CUSTOM SCROLL BAR JS-->
        <script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

        <!-- SIDEBAR JS -->
        <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

        <!-- CUSTOM JS-->
        <script src="{{ asset('assets/js/custom.js') }}"></script>

    </body>
</html>