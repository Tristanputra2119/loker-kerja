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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex">
    <div id="app" class="flex flex-1 min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg min-h-screen">
            <div class="h-16 flex items-center justify-center border-b border-gray-200">
                <span class="text-lg font-bold text-gray-800">{{ config('app.name', 'Admin') }}</span>
            </div>
            <nav class="mt-4">
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-tachometer-alt text-gray-500"></i> <!-- Ikon Dashboard -->
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/users" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-users text-gray-500"></i> <!-- Ikon Users -->
                            <span class="ml-3">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="/companies" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-building text-gray-500"></i> <!-- Ikon Company -->
                            <span class="ml-3">Company</span>
                        </a>
                    </li>
                    <li>
                        <a href="/notifications" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 relative">
                            <i class="fas fa-bell text-gray-500"></i>
                            <span class="ml-3">Notifications</span>

                            <!-- Tampilkan tanda indikator jika ada notifikasi pending -->
                            @if(isset($pendingNotifications) && $pendingNotifications->count() > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-semibold text-white bg-red-500 rounded-full">
                                {{ $pendingNotifications->count() }}
                            </span>
                            @endif
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 min-h-screen flex flex-col">
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
                        <a href="/notifications" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">notification</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-auto p-6 bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>