<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Primakara Career Centre') }}</title>
    @vite('resources/css/app.css') <!-- Pastikan Tailwind diintegrasikan -->
</head>

<body class="bg-gray-50 .navigation">

    <!-- Header -->
    <!-- Header -->
    <header class="bg-white shadow-md py-4 sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="{{ route('home') }}">
                <h1 class="text-xl font-bold text-blue-600">Primakara <span class="text-gray-900">Career Centre</span></h1>
            </a>

            <!-- Navigation Menu -->
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="{{ route('job.index') }}" class="text-gray-700 hover:text-blue-600">Jobs</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">About</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Contact</a>
            </nav>

            <!-- Profile Dropdown (Photo Only) -->
            <div class="relative">
                <button id="profile-dropdown-button" class="flex items-center">
                    <!-- Cek apakah pengguna login dan memiliki foto profil -->
                    @if(auth()->check() && auth()->user()->profile_picture)
                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto Profil" class="w-10 h-10 rounded-full">
                    @else
                    <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="w-10 h-10 rounded-full"> <!-- Gambar default jika tidak ada foto -->
                    @endif
                </button>
                <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden z-10">
                    <ul class="py-2">
                        <li><a href="{{ route('notifications.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Notifikasi</a></li>
                        <li><a href="{{ route('profil.info') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Info Profil</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <main class="home">
        @yield('content') <!-- Konten dinamis akan ditempatkan di sini -->
    </main>

    <!-- Footer -->
    <footer class="bg-[#00B4DB] text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- About Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">About Us</h3>
                    <p class="text-sm text-gray-100">PCC is committed to bridging the gap between education and career by empowering students with opportunities to achieve their dream careers.</p>
                </div>

                <!-- Links Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Home</a></li>
                        <li><a href="#" class="hover:underline">Programs</a></li>
                        <li><a href="#" class="hover:underline">Admissions</a></li>
                        <li><a href="#" class="hover:underline">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <p class="text-sm text-gray-100">1234 Main Street, Bali, Indonesia</p>
                    <p class="text-sm text-gray-100">Email: info@pcc.ac.id</p>
                    <p class="text-sm text-gray-100">Phone: +62 123 456 789</p>
                </div>

                <!-- Social Media Section -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-100 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-100 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-100 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-100 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-8 pt-4 text-center">
                <p class="text-sm text-gray-100">&copy; 2024 PCC. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript to handle dropdown visibility
        const dropdownButton = document.getElementById('profile-dropdown-button');
        const dropdownMenu = document.getElementById('profile-dropdown');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicked outside
        window.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

</body>

</html>