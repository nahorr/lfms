<!doctype html>
<html lang="en">
    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/images/brand/favicon.ico') }}" />

        <!-- TITLE -->
        <title>Law Firm Managment System –  From Nahorr Analytics</title>

        <!-- BOOTSTRAP CSS -->
        <link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet"/>
        <link href="{{ asset('/assets/css/skin-modes.css') }}" rel="stylesheet"/>
        <link href="{{ asset('/assets/css/dark-style.css') }}" rel="stylesheet"/>

        <!-- INTERNAL SINGLE-PAGE CSS -->
        <link href="{{ asset('/assets/plugins/single-page/css/main.css') }}" rel="stylesheet" type="text/css">

        <!-- INTERNAL SUMMERNOTE CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/plugins/summernote/summernote-bs4.css') }}">


        <!-- CUSTOM SCROLL BAR CSS-->
        <link href="{{ asset('/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>

        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet"/>

        <!-- SIDEBAR CSS -->
        <link href="{{ asset('/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('/assets/colors/color1.css') }}" />

        <!-- INTERNAL SELECT2 CSS -->
        <link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

        <!-- INTERNAL  DATA TABLE CSS-->
        <link href="{{ asset('/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet" />

        <!-- CUSTOM SCROLL BAR CSS-->
        <link href="{{ asset('/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>

        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet"/>

        <!-- INTERNAL  FILE UPLODE CSS -->
        <link href="{{ asset('/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>

        <!-- INTERNAL BOOTSTRAP-DATERANGEPICKER CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">

        <!-- INTERNAL  TIME PICKER CSS -->
        <link href="{{ asset('/assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet"/>

        <!-- INTERNAL  DATE PICKER CSS-->
        <link href="{{ asset('/assets/plugins/date-picker/spectrum.css') }}" rel="stylesheet"/>

        <!-- INTERNAL  MULTI SELECT CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/plugins/multipleselect/multiple-select.css') }}">

        <!-- INTERNAL TELEPHONE CSS-->
        <link rel="stylesheet" href="{{ asset('/assets/plugins/telephoneinput/telephoneinput.css') }}">

    </head>

    <body>

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
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
                            <a class="header-brand" href="{{ url('/user/home') }}">
                                <img src="{{ asset('/assets/images/brand/logo-3.png') }}" class="header-brand-img mobile-icon" alt="logo">
                                <span style="text-transform: uppercase;">
                                    {{ \App\Company::where('id', Auth::user()->company_id)->first()->company_name }}
                                </span>
                                <img src="{{ asset('/assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo mobile-logo" alt="logo">
                            </a>
                            @else
                            <a class="header-brand" href="{{ url('/') }}">
                                <img src="{{ asset('/assets/images/brand/logo-3.png') }}" class="header-brand-img mobile-icon" alt="logo">
                                <img src="{{ asset('/assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo mobile-logo" alt="logo">
                            </a>
                            @endauth
                            <div class="d-flex ml-auto header-right-icons header-search-icon">
                                <!--For when user is Authenticated-->
                                @auth
                                <div class="dropdown d-none d-md-flex notifications">
                                    <a class="nav-link icon" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z" opacity=".3"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg>
                                        <span class="pulse1 bg-success"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <div class="notifications-menu">
                                            <a class="dropdown-item d-flex pb-4" href="#">
                                                <span class="avatar mr-3 br-3 align-self-center avatar-md cover-image bg-primary brround">
                                                    <i class="fe fe-mail"></i></span>
                                                <div>
                                                    <span class="font-weight-bold"> Commented on your post </span>
                                                    <div class="small text-muted d-flex">
                                                        3 hours ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-4" href="#">
                                                <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-secondary brround">
                                                    <i class="fe fe-download"></i>
                                                </span>
                                                <div>
                                                    <span class="font-weight-bold"> New file has been Uploaded </span>
                                                    <div class="small text-muted d-flex">
                                                        5 hour ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-4" href="#">
                                                <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-warning brround">
                                                    <i class="fe fe-user"></i>
                                                </span>
                                                <div>
                                                    <span class="font-weight-bold"> User account has Updated</span>
                                                    <div class="small text-muted d-flex">
                                                        20 mins ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-4" href="#">
                                                <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-info brround">
                                                    <i class="fe fe-shopping-cart"></i>
                                                </span>
                                                <div>
                                                    <span class="font-weight-bold"> New Order Recevied</span>
                                                    <div class="small text-muted d-flex">
                                                        1 hour ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-4" href="#">
                                                <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-danger brround">
                                                    <i class="fa fa-commenting-o"></i>
                                                </span>
                                                <div>
                                                    <span class="font-weight-bold"> 3 New Comments</span>
                                                    <div class="small text-muted d-flex">
                                                        1 day ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-4" href="#">
                                                <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-success brround">
                                                    <i class="fe fe-server"></i>
                                                </span>
                                                <div>
                                                    <span class="font-weight-bold">Server Rebooted</span>
                                                    <div class="small text-muted d-flex">
                                                        2 hour ago
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center">View all Notification</a>
                                    </div>
                                </div><!-- NOTIFICATIONS -->
                                <div class="dropdown d-none d-md-flex message">
                                    <a class="nav-link icon text-center" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z"/></svg>
                                        <span class="nav-unread badge badge-danger badge-pill pulse">3</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <div class="message-menu">
                                            <a class="dropdown-item d-flex pb-3" href="#">
                                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{ asset('/assets/images/users/1..jpg') }}"></span>
                                                <div>
                                                    <strong>Madeleine</strong> Hey! there I' am available....
                                                    <div class="small text-muted">
                                                        3 hours ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-3" href="#">
                                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{ asset('/assets/images/users/12..jpg') }}"></span>
                                                <div>
                                                    <strong>Anthony</strong> New product Launching...
                                                    <div class="small text-muted">
                                                        5 hour ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-3" href="#">
                                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{ asset('/assets/images/users/4..jpg') }}"></span>
                                                <div>
                                                    <strong>Olivia</strong> New Schedule Realease......
                                                    <div class="small text-muted">
                                                        45 mintues ago
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex pb-3" href="#">
                                                <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{ asset('/assets/images/users/15..jpg') }}"></span>
                                                <div>
                                                    <strong>Sanderson</strong> New Schedule Realease......
                                                    <div class="small text-muted">
                                                        2 days ago
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center">See all Messages</a>
                                    </div>
                                </div><!-- MESSAGE-BOX -->
                                
                                <div class="dropdown profile-1">
                                    <a href="#" data-toggle="dropdown" class="nav-link pl-2 pr-2  leading-none d-flex">
                                        <span>
                                            <img src="{{ asset('/uploads/avatars/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="avatar  mr-xl-3 profile-user brround cover-image">
                                        </span>
                                        <div class="text-center mt-2 d-none d-xl-block">
                                            <h6 class="text-dark mb-0 fs-13 font-weight-semibold">{{ Auth::user()->name }}</h6>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ url('/user/profile') }}">
                                            <i class="dropdown-icon mdi mdi-account-outline"></i> My Profile
                                        </a>
                                        @if(Auth::user()->is_admin == 1)
                                        <a class="dropdown-item" href="{{ url('/admin/home') }}">
                                            <i class="dropdown-icon  mdi mdi-account-plus"></i> Administrator
                                        </a>
                                        @endif
                                        @if(Auth::user()->is_superadmin == 1)
                                        <a class="dropdown-item" href="{{ url('/super/home') }}">
                                            <span class="float-right"></span>
                                            <i class="dropdown-icon mdi mdi-account-key"></i> Super Admin
                                        </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="dropdown-icon mdi mdi-power"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
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

                <!--/Horizontal-main -->
                @auth
                
                    @if((Request::is('user/*') && Auth::user()->group_id == 1) || Request::is('super/*'))
                        @include('includes.navbar-super')
                    @elseif((Request::is('admin/*') && (Auth::user()->group_id == 2 || Auth::user()->group_id == 3)) || (Auth::user()->group_id == 2 || Auth::user()->group_id == 3)) 
                        @include('includes.navbar-admin')
                    @elseif((Request::is('admin/*') && Auth::user()->group_id == 4) || Request::is('admin/*'))
                        @include('includes.navbar-lawyer')
                    @endif

                @endauth
                <!--/Horizontal-main -->

                <!--Content-area open-->
                <div class="content-area">
                    <div class="container">
                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <div>
                               
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{\Route::current()->getName()}}</li>
                                </ol>
                            </div>
                            <div class="ml-auto pageheader-btn">
                                @if(Auth::user()->group_id == 1)
                                <a href="{{ url('/super/companies/newcompany') }}" class="btn btn-secondary btn-icon text-white mr-2">
                                    <span>
                                        <i class="fa fa-building-o text-white"></i>
                                    </span> <strong>Add Company</strong>
                                </a>
                                <a href="{{ url('/super/users/newuser') }}" class="btn btn-warning btn-icon text-white mr-2">
                                    <span>
                                        <i class="fe fe-user"></i>
                                    </span> <strong>Add User</strong>
                                </a>
                                <a href="#" class="btn btn-primary btn-icon text-white">
                                    <span>
                                        <i class="fa fa-dollar"></i>
                                    </span> <strong>Add Payment</strong>
                                </a>
                                @elseif(Auth::user()->group_id == 2 || Auth::user()->group_id == 3)
                                <a href="{{ url('/admin/lawyers/newlawyer/'.Auth::user()->company_id) }}" class="btn btn-warning btn-icon text-white mr-2">
                                    <span>
                                        <i class="fe fe-user"></i>
                                    </span> <strong>Add Lawyer</strong>
                                </a>
                                    @if(Auth::user()->group_id == 2)
                                    <a href="{{ url('/admin/users/newuser/'.Auth::user()->company_id) }}" class="btn btn-warning btn-icon text-white mr-2">
                                        <span>
                                            <i class="fe fe-user"></i>
                                        </span> <strong>Add Employee</strong>
                                    </a>
                                    @endif
                                <a href="{{ url('admin/clients/newclient/'.Auth::user()->company_id) }}" class="btn btn-primary btn-icon text-white mr-2">
                                    <span>
                                        <i class="fe fe-user"></i>
                                    </span> Add Client
                                </a>
                                <a href="#" class="btn btn-secondary btn-icon text-white">
                                    <span>
                                        <i class="fe fe-file-text"></i>
                                    </span> Add Document
                                </a>
                                @endif
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        @yield('content')

                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>

            <!-- FOOTER -->
            <footer class="footer">
                <div class="container">
                    <!-- ROW-4 OPEN -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">

                                    <div class="footer border-top-0 footer-1">
                                        <div class="container">
                                            <div class="row align-items-center text-center">
                                                <div class="col-lg-6 col-md-6 d-none d-md-block ">
                                                    <div class="social">
                                                        <ul class="text-center m-0 ">
                                                            <li>
                                                                <a class="social-icon" href=""><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href=""><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href=""><i class="fa fa-rss"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href=""><i class="fa fa-youtube"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href=""><i class="fa fa-linkedin"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href=""><i class="fa fa-google-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 text-right privacy">
                                                    <a href="#" class="btn btn-link" >Privacy</a>
                                                    <a href="#" class="btn btn-link" >Terms</a>
                                                    <a href="#" class="btn btn-link" >About Us</a>
                                                </div>
                                            </div>
                                            <div class="row align-items-center flex-row-reverse">
                                                <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
                                                    Copyright © 2020 <a href="#">LFMS</a>. Developed By <a href="www.nahorr.com">Nahorr Analytics</a> All rights reserved.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- pagination-wrapper -->
                                </div>
                                <!-- section-wrapper -->
                            </div><!-- COL-END -->
                        </div>
                        <!-- ROW-4 CLOSED -->
                </div>
            </footer>
            <!-- FOOTER CLOSED -->
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/bootstrap/js/popper.min.js') }}"></script>

        <!-- SPARKLINE JS-->
        <script src="{{ asset('/assets/js/jquery.sparkline.min.js') }}"></script>

        <!-- CHART-CIRCLE JS-->
        <script src="{{ asset('/assets/js/circle-progress.min.js') }}"></script>

        <!-- RATING STAR JS-->
        <script src="{{ asset('/assets/plugins/rating/jquery.rating-stars.js') }}"></script>

        <!-- EVA-ICONS JS -->
        <script src="{{ asset('/assets/iconfonts/eva.min.js') }}"></script>

        <!-- INPUT MASK JS-->
        <script src="{{ asset('/assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

        <!--HORIZONTAL JS-->
        <script src="{{ asset('/assets/plugins/horizontal-menu/horizontal-menu.js') }}"></script>

        <!-- CUSTOM SCROLL BAR JS-->
        <script src="{{ asset('/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

        <!-- INTERNAL  DATA TABLE JS-->
        <script src="{{ asset('/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/datatable.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/jszip.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>
        <!-- SIDEBAR JS -->
        <script src="{{ asset('/assets/plugins/sidebar/sidebar.js') }}"></script>

        <!-- INTERNAL  FILE UPLOADES JS -->
        <script src="{{ asset('/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
        <script src="{{ asset('/assets/plugins/fileuploads/js/file-upload.js') }}"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="{{ asset('/assets/plugins/select2/select2.full.min.js') }}"></script>

        <!-- INTERNAL BOOTSTRAP-DATERANGEPICKER JS -->
        <script src="{{ asset('/assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <!-- INTERNAL  TIMEPICKER JS -->
        <script src="{{ asset('/assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
        <script src="{{ asset('/assets/plugins/time-picker/toggles.min.js') }}"></script>

        <!-- INTERNAL DATEPICKER JS-->
        <script src="{{ asset('/assets/plugins/date-picker/spectrum.js') }}"></script>
        <script src="{{ asset('/assets/plugins/date-picker/jquery-ui.js') }}"></script>
        <script src="{{ asset('/assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>

        <!-- INTERNAL MULTI SELECT JS -->
        <script src="{{ asset('/assets/plugins/multipleselect/multiple-select.js') }}"></script>
        <script src="{{ asset('/assets/plugins/multipleselect/multi-select.js') }}"></script>

        <!--INTERNAL  FORMELEMENTS JS -->
        <script src="{{ asset('/assets/js/form-elements.js') }}"></script>
        <script src="{{ asset('/assets/js/select2.js') }}"></script>

        <!-- INTERNAL SUMMERNOTE JS -->
        <script src="{{ asset('/assets/plugins/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('/assets/js/summernote.js') }}"></script>

        <!-- STICKY JS -->
        <script src="{{ asset('/assets/js/stiky.js') }}"></script>

        <!-- INTERNAL  CLIPBOARD JS -->
        <script src="{{ asset('/assets/plugins/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('/assets/plugins/clipboard/clipboard.js') }}"></script>

        <!-- CUSTOM JS-->
        <script src="{{ asset('/assets/js/custom.js') }}"></script>

    </body>
</html>