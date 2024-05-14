<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- {{-- <scri src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_KEY') }}"></script> --}} -->
    <style>
        .grecaptcha-badge {
            width: 70px !important;
            overflow: hidden !important;
            transition: all 0.3s ease !important;
            left: 4px !important;
        }

        .grecaptcha-badge:hover {
            width: 256px !important;
        }
    </style>
    @include('sweetalert::alert')
    @livewireStyles
    @vite(['node_modules/waypoints/lib/noframework.waypoints.min.js', 'node_modules/aos/dist/aos.css', 'node_modules/bootstrap-icons/font/bootstrap-icons.min.css', 'node_modules/boxicons/css/boxicons.min.css', 'node_modules/swiper/swiper-bundle.min.css', 'node_modules/glightbox/dist/css/glightbox.min.css', 'node_modules/bootstrap/scss/bootstrap.scss', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        </nav>
        <main class="pt-4">
            <header id="header" class="d-flex flex-column justify-content-center">
                @include('FrontPages.Header.navigation')
            </header><!-- End Header -->
            @include('FrontPages.Header.hero')
            <main id="main">
                @include('FrontPages.Main.about')
                {{-- @include('FrontPages.Main.facts') --}}
                @include('FrontPages.Main.areaofexpertise')
                @include('FrontPages.Main.skills')
                @include('FrontPages.Main.resume')
                {{-- @include('FrontPages.Main.portfolio') --}}
                @include('FrontPages.Main.services')
                {{-- @include('FrontPages.Main.testimonials') --}}
                {{-- @include('FrontPages.Main.contact') --}}
                {{ $slot }}
            </main><!-- End #main -->
            @include('FrontPages.Footer.footer')
            <div id="preloader"></div>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
            <!-- Vendor JS Files -->
        </main>
    </div>
    @livewireScripts
</body>
</html>
