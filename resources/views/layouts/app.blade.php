<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}


    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar,
        .sidebar {
            background-color: #ffffff;
        }

        .navbar-brand,
        .nav-link {
            color: #495057 !important;
        }

        .sidebar {
            min-height: 100vh;
            border-right: 1px solid #e9ecef;
        }

        .sidebar .nav-link {
            color: #495057;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #0d6efd;
            background-color: #e9ecef;
        }

        .btn-custom {
            background-color: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 0.25rem;
        }

        .btn-custom:hover {
            background-color: #0b5ed7;
        }

        .card {
            border: 1px solid #e9ecef;
            border-radius: 0.5rem;
        }

        .quick-actions .btn {
            border: 1px solid #e9ecef;
            color: #495057;
            background-color: #ffffff;
            transition: all 0.2s ease-in-out;
        }

        .quick-actions .btn:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
        }

        .overview-card {
            height: 100%;
        }

        .overview-card .card-title {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .overview-card .card-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #212529;
        }

        .sidebar .nav-item .submenu {
            padding-left: 1rem;
        }

        .sidebar .nav-item .submenu .nav-link {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
    </style>
</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        </nav> --}}

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fas fa-bolt me-2"></i>Webhook Auto Syncer Manager</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="github-login.html">GitHub Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <i class="fas fa-home me-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#webhooksSubmenu" aria-expanded="false">
                                    <i class="fas fa-webhook me-2"></i>Webhooks <i
                                        class="fas fa-caret-down float-end"></i>
                                </a>
                                <div class="collapse" id="webhooksSubmenu">
                                    <ul class="nav flex-column submenu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#create-webhook">Create Webhook</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#manage-webhook">Manage Webhook</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#settings">
                                    <i class="fas fa-cog me-2"></i>Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <h1 class="h2">Dashboard</h1>
                    </div>

                    @yield('content')

                </main>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
