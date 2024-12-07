<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Admin') }}</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100">
    <div id="app" class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="h-16 flex items-center justify-center border-b border-gray-200">
                <span class="text-lg font-bold text-gray-800">{{ config('app.name', 'Admin') }}</span>
            </div>
            <nav class="mt-4">
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 18v-7m0 0l-3-3m3 3l3-3" />
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/users" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A3 3 0 017 16h10a3 3 0 011.879.804l1.15 1.15a1 1 0 01-1.415 1.415l-1.15-1.15A3 3 0 0117 19H7a3 3 0 01-1.879-.804l-1.15 1.15a1 1 0 11-1.415-1.415l1.15-1.15zM12 12a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                            <span class="ml-3">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 18v-7m0 0l-3-3m3 3l3-3" />
                            </svg>
                            <span class="ml-3">Company</span>
                        </a>
                    </li>
                    <li>
                        <a href="/settings" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V5a1 1 0 112 0v6m0 2v6a1 1 0 11-2 0v-6m-7 0H5a1 1 0 110-2h6m2 0h6a1 1 0 110 2h-6" />
                            </svg>
                            <span class="ml-3">Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="h-16 bg-white shadow flex items-center justify-between px-6">
                <h1 class="text-xl font-semibold text-gray-800">Admin Dashboard</h1>
                <div x-data="{ open: false }" class="relative">
                    @auth
                    <!-- Dropdown untuk Profil -->
                    <button @click="open = !open" class="flex items-center focus:outline-none">
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" class="h-10 w-10 rounded-full">
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg">
                        <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                        <a href="/settings" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-6 bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>