<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PCC') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-100">
    <div id="app" class="h-full flex flex-col">
        <!-- Navbar (Visible Only for Authenticated Users) -->
        @auth
        <nav class="bg-white shadow-md flex items-center justify-between p-4">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-800">
                {{ config('app.name', 'PCC') }}
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4">
                <div class="relative">
                    <button id="dropdownButton" class="flex items-center space-x-2 bg-gray-200 p-2 rounded-md hover:bg-gray-300 transition focus:outline-none">
                        <span class="font-medium text-gray-800">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left text-gray-800 hover:bg-gray-100 px-4 py-2 rounded-md">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuButton" class="md:hidden flex items-center text-gray-800 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white shadow-md p-4">
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left text-gray-800 hover:bg-gray-100 px-4 py-2 rounded-md">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
        @endauth

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            @yield('content')
        </main>
    </div>

    <!-- Dropdown Toggle Script -->
    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        if (dropdownButton && dropdownMenu) {
            dropdownButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function (event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        }

        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>

</html>
