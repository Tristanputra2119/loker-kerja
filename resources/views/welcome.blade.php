<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header with Blue Theme -->
    <header class="bg-white text-black py-4 [box-shadow:0_4px_8px_rgba(169,169,169,0.1)] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="text-lg font-bold">
                    <a href="{{ url('/') }}" class="text-black">PCC</a>
                </div>

                <!-- Navigation -->
                @if (Route::has('login'))
                <nav class="flex space-x-4">
                    @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-lg px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 transition dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
                        Dashboard
                    </a>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-lg px-4 py-2 text-white"
                        style="background-color: #00B4DB; hover:bg-blue-400 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <a
                        href="{{ route('register') }} "
                        class="rounded-lg px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 transition dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </div>
        </div>
    </header>

    <section class="flex items-center text-white py-16 px-4">
        <div class="max-w-7xl mx-auto flex items-center space-x-8">
            <!-- Left Side - Text and Button -->
            <div class="flex-1 ml-[30px]">
                <h1 class="text-7xl font-bold text-black mb-[30px]">
                    Jembatan Menuju Karier <span class="text-[#00B4DB]">Impian</span> Anda
                </h1>
                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 text-white rounded-lg text-lg font-semibold transition"
                    style="background-color: #00B4DB; hover:bg-blue-400">
                    <span>Login Sekarang</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Right Side - Image -->
            <div class="flex-1">
                <img src="{{ asset('img/Frame 100.png') }}" alt="Banner Image" class="w-full rounded-lg ">
            </div>
        </div>
    </section>

    <section class="py-8 px-4">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-8">Data Lulusan Primakara</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="bg-white [box-shadow:0_4px_8px_rgba(169,169,169,0.3)] rounded-lg p-6 text-center">
                <p class="text-3xl font-bold text-blue-500">94.80%</p>
                <p class="text-gray-600 mt-2">Lulusan Primakara bekerja secara layak</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white [box-shadow:0_4px_8px_rgba(169,169,169,0.3)] rounded-lg p-6 text-center">
                <p class="text-3xl font-bold text-blue-500">77.25%</p>
                <p class="text-gray-600 mt-2">Lulusan Primakara bekerja sesuai bidang studii</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white [box-shadow:0_4px_8px_rgba(169,169,169,0.3)] rounded-lg p-6 text-center">
                <p class="text-3xl font-bold text-blue-500">69.20%</p>
                <p class="text-gray-600 mt-2">Lulusan Primakara sudah bekerja sebelum wisuda</p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white [box-shadow:0_4px_8px_rgba(169,169,169,0.3)] rounded-lg p-6 text-center">
                <p class="text-3xl font-bold text-blue-500">19.05%</p>
                <p class="text-gray-600 mt-2">Lulusan Primakara menjadi technoprenur</p>
            </div>
        </div>

        <p class="text-sm text-gray-500 text-center mt-4">Sumber: Tracer Study Tahun 2023</p>
    </section>

    <!-- Partner Logos Section -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-black mb-8">Our Partners</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 justify-center">
                <!-- Logo 1 -->
                <div class="flex justify-center items-center">
                    <img src="{{ asset('img/download.png') }}" alt="Partner 1 Logo" class="h-20"> <!-- Meningkatkan ukuran logo -->
                </div>
                <!-- Logo 2 -->
                <div class="flex justify-center items-center">
                    <img src="{{ asset('img/Microsoft-Logo.wine.png') }}" alt="Partner 2 Logo" class="h-20"> <!-- Meningkatkan ukuran logo -->
                </div>
                <!-- Logo 3 -->
                <div class="flex justify-center items-center">
                    <img src="{{ asset('img/Mojang-Logo.png') }}" alt="Partner 3 Logo" class="h-20"> <!-- Meningkatkan ukuran logo -->
                </div>
                <!-- Logo 4 -->
                <div class="flex justify-center items-center">
                    <img src="{{ asset('img/Studio_Pierrot_logo-portrait.png') }}" alt="Partner 4 Logo" class="h-20"> <!-- Meningkatkan ukuran logo -->
                </div>
                <!-- Logo 5 -->
                <div class="flex justify-center items-center">
                    <img src="{{ asset('img/Apple_logo_black.svg.png') }}" alt="Partner 4 Logo" class="h-20"> <!-- Meningkatkan ukuran logo -->
                </div>
            </div>
        </div>
    </section>


<<<<<<< HEAD
    <!-- Footer Section -->
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


</body>

</html>
=======
</body>

</html>
>>>>>>> ece380b58ea06f68d00e4dabb155a16b90af937c
