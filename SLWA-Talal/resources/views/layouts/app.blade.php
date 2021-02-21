<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SLWA</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Icons font CSS-->
    <link rel="stylesheet" type="text/css" href="/template/vendor/mdi-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="/template/vendor/font-awesome-4.7/css/font-awesome.min.css">

    <!-- Font special for pages-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">

    <!-- Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/template/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/template/vendor/datepicker/daterangepicker.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand title" href="{{ url('/') }}">
                   <b>S</b>hared <b>L</b>earning <b>W</b>eb <b>A</b>pplication
                  <a href="" class="small"> <h3>SLWA </h3> </a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><b>Login</b></a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><b>Register</b></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                
                                @if (Auth::user()->provider_id == null || Auth::user()->changePicture == "true")
                                <img src="/images/avatars/{{Auth::user()->avatar}}" alt="{{ Auth::user()->name}}" onerror="this.src='/images/avatars/default.png';" style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: 39px; float:left; margin-right: 7px;">
                                
                                @else
                                <img src={{Auth::user()->avatar}} alt="{{ Auth::user()->name}}" onerror="this.src='/images/avatars/default.png';" style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: 39px; float:left; margin-right: 7px;">
                                
                                @endif
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    

                                    <a class="dropdown-item" href="{{ url('home') }}">
                                        <i class="fa fa-home"></i>
                                        Home
                                    </a>

                                    <a class="dropdown-item" href="{{ url('notification') }}">
                                        <i class="fa fa-bell"></i>
                                        Notifications
                                    </a>

                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
