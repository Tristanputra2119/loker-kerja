@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<section class="text-center py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <img src="img/Frame 100.png" alt="Illustration" class="w-full md:w-1/2 mx-auto mb-8 md:mb-0">
            <div class="text-left md:pl-8 md:w-1/2">
                <h2 class="text-4xl font-bold text-gray-900">Jembatan Menuju Karier <span class="text-blue-600">Impian Anda!</span></h2>
                <p class="mt-4 text-gray-700">Temukan peluang karier terbaik untuk masa depan Anda dengan bantuan platform kami.</p>
                <div class="mt-6 flex justify-start space-x-4">
                    <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-lg">Cek Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Data Section -->
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <h3 class="text-2xl font-bold text-center text-gray-900">Data Lulusan Primakara</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6 text-center">
            <!-- Data Cards -->
            <div class="bg-white p-6 shadow-md rounded-lg">
                <p class="text-4xl font-bold text-blue-600">94.80%</p>
                <p>Lulusan bekerja secara layak</p>
            </div>
            <div class="bg-white p-6 shadow-md rounded-lg">
                <p class="text-4xl font-bold text-blue-600">77.25%</p>
                <p>Lulusan bekerja sesuai bidang studi</p>
            </div>
            <div class="bg-white p-6 shadow-md rounded-lg">
                <p class="text-4xl font-bold text-blue-600">69.20%</p>
                <p>Lulusan bekerja sebelum wisuda</p>
            </div>
            <div class="bg-white p-6 shadow-md rounded-lg">
                <p class="text-4xl font-bold text-blue-600">19.05%</p>
                <p>Lulusan menjadi technopreneur</p>
            </div>
        </div>
    </div>
</section>

<!-- Job Search Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h3 class="text-3xl font-bold text-center text-gray-900">
            Cari dan Temukan Pekerjaan <span class="text-blue-600">Impian Anda!</span>
        </h3>
        <div class="mt-8 flex justify-center">
            <form action="{{ route('job.search') }}" method="GET" class="flex items-center w-full max-w-3xl space-x-2">
                <!-- Input field -->
                <input
                    type="text"
                    name="search"
                    placeholder="Cari Pekerjaan"
                    class="flex-grow p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-600 focus:border-blue-600">
                <!-- Search button -->
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-4 rounded-lg hover:bg-blue-700 transition duration-300">
                    Searh
                </button>
            </form>
        </div>
        <!-- Category buttons -->
        <div class="flex justify-center mt-6 flex-wrap gap-4">
            @foreach($categories as $category)
            <a
                href="{{ route('job.search', ['category' => $category->id]) }}"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h3 class="text-3xl font-bold text-center text-gray-900">Testimoni Mahasiswa</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-white p-6 shadow-md rounded-lg">
                <p class="text-gray-800">"Berkat platform ini, saya berhasil mendapatkan pekerjaan impian saya dengan mudah dan cepat."</p>
                <p class="mt-4 font-bold text-blue-600">Anjay Mabar</p>
                <p class="text-sm text-gray-600">Web Developer</p>
            </div>
            <div class="bg-white p-6 shadow-md rounded-lg">
                <p class="text-gray-800">"Sangat membantu saya dalam mencari pekerjaan yang sesuai dengan bidang studi saya."</p>
                <p class="mt-4 font-bold text-blue-600">Anjay Mabar</p>
                <p class="text-sm text-gray-600">Web Developer</p>
            </div>
            <div class="bg-white p-6 shadow-md rounded-lg">
                <p class="text-gray-800">"Prosesnya cepat dan sangat transparan, terima kasih Primakara Career Centre!"</p>
                <p class="mt-4 font-bold text-blue-600">Anjay Mabar</p>
                <p class="text-sm text-gray-600">Web Developer</p>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
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

@endsection