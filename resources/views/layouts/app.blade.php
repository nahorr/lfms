<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Nahorr Analytics') }}</title>
    
    <base hrefs="/">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Font Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
                    <a class="navbar-brand" href="{{ url('/user/home') }}">
                        <strong>Dashboard</strong>
                    </a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if (Auth::check())
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Cases</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Agreements
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Hire Purchase Agreement</a>
                                <a class="dropdown-item" href="#">Land Agreement</a>
                                <a class="dropdown-item" href="#">Loan Agreement</a>
                                <a class="dropdown-item" href="#">Partnership Agreement</a>
                                <a class="dropdown-item" href="#">Copy Right Agreement</a>
                                <a class="dropdown-item" href="#">Memorandum of Understanding</a>
                                <a class="dropdown-item" href="#">Business Agreement</a>
                                <a class="dropdown-item" href="#">Contract Agreement</a>
                            </div>
                        </li>
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if((\Request::is('register_company')) || (\Request::is('register')))
                                <a class="navbar-brand btn btn-primary" href="{{ route('login') }}" role="button">
                                    <strong style="color: white">Login</strong>
                                </a>
                            @elseif(\Request::is('login'))
                                <a class="navbar-brand btn btn-primary" href="{{ route('registercompany') }}">
                                    <strong style="color: white">Set Up Your Company</strong>
                                </a>
                            @endif
                        @else

                            <li class="nav-item dropdown">

                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('/uploads/avatars/'.Auth::user()->avatar) }}" style="width 40px; height:40px; float:left; border-radius:50%; margin: -6px 7px;" class="float-left img-thumbnail">
                                        {{ Auth::user()->name }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ url('/user/home') }}"><i class="fas fa-desktop"></i> Home</a>

                                    <a class="dropdown-item" href="{{ url('/user/profile') }}"><i class="fas fa-user"></i> My Profile</a>
                                    
                                    @if(Auth::user()->is_admin == 1)
                                        <a class="dropdown-item" href="{{ url('/admin/home') }}"><i class="fas fa-cog"></i> Administrator</a>
                                    @endif

                                    @if(Auth::user()->is_superadmin == 1)
                                        <a class="dropdown-item" href="{{ url('/super/home') }}"><i class="fas fa-user-plus"></i> Super User</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).on("show.bs.modal", '.modal', function (event) {
            console.log("Global show.bs.modal fire");
            var zIndex = 100000 + (10 * $(".modal:visible").length);
            $(this).css("z-index", zIndex);
            setTimeout(function () {
                $(".modal-backdrop").not(".modal-stack").first().css("z-index", zIndex - 1).addClass("modal-stack");
            }, 0);
        }).on("hidden.bs.modal", '.modal', function (event) {
            console.log("Global hidden.bs.modal fire");
            $(".modal:visible").length && $("body").addClass("modal-open");
        });
        $(document).on('inserted.bs.tooltip', function (event) {
            console.log("Global show.bs.tooltip fire");
            var zIndex = 100000 + (10 * $(".modal:visible").length);
            var tooltipId = $(event.target).attr("aria-describedby");
            $("#" + tooltipId).css("z-index", zIndex);
        });
        $(document).on('inserted.bs.popover', function (event) {
            console.log("Global inserted.bs.popover fire");
            var zIndex = 100000 + (10 * $(".modal:visible").length);
            var popoverId = $(event.target).attr("aria-describedby");
            $("#" + popoverId).css("z-index", zIndex);
        });

    </script>

</body>
</html>
