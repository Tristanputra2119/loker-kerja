<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-100 overflow-hidden">
    <div id="app" class="h-full flex flex-col">
        <nav class="bg-white shadow-md flex items-center justify-between p-2">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800">
                {{ config('app.name', 'PCC') }}
            </a>

            <div class="flex items-center space-x-4">
                <!-- Authentication Links -->
                @guest
                <div class="flex space-x-4">
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-blue-600 hover:bg-blue-100 px-4 py-2 rounded-md transition">Login</a>
                    @endif
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-md transition">Register</a>
                    @endif
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
                @else
                <div class="relative">
                    <button class="flex items-center space-x-2 bg-gray-200 p-2 rounded-md hover:bg-gray-300 transition focus:outline-none" id="dropdownButton" aria-haspopup="true" aria-expanded="false">
                        <span class="font-medium text-gray-800">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>

                    <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="px-2 py-1">
                            @csrf
                            <button type="submit" class="w-full text-left text-gray-800 hover:bg-gray-100 px-2 py-1 rounded-md">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
                @endguest
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden flex items-center text-gray-800" id="mobileMenuButton">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <main class="flex-1 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>

</html>