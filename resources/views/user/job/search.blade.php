@extends('layouts.user')

@section('content')
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">
                Temukan Pekerjaan Yang <span class="text-blue-600">Cocok</span> Untuk Anda!
            </h1>
            <p class="text-gray-600 mt-2">Ratusan perusahaan teknologi menunggu</p>
            <div class="relative mt-6">
                <input
                    type="text"
                    class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Cari Pekerjaan" />
                <button class="absolute right-2 top-2 bg-blue-600 text-white px-4 py-2 rounded-lg">
                    <svg class="h-5 w-5" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4-4-4m4 4h12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-wrap -mx-4">
            <!-- Sidebar Filters -->
            <aside class="w-full md:w-1/4 px-4 mb-8 md:mb-0">
                <form action="{{ route('jobs.index') }}" method="GET" class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold text-gray-800 mb-4">Filters</h3>

                    <div class="sidebar p-4 bg-white rounded shadow">
                        <!-- Filter Lokasi -->
                        <h4 class="font-bold text-lg mb-2">Lokasi</h4>
                        <ul class="mb-4">
                            @forelse ($locations as $location)
                            <li class="mb-1">
                                <a href="{{ route('jobs.index', ['location' => $location]) }}" class="text-blue-600 hover:underline">
                                    {{ $location }}
                                </a>
                            </li>
                            @empty
                            <li class="text-gray-500">Tidak ada lokasi tersedia.</li>
                            @endforelse
                        </ul>


                        <!-- Filter Tanggal Posting -->
                        <h4 class="font-bold text-lg mb-2">Tanggal Posting</h4>
                        <ul class="mb-4">
                            <li class="mb-1">
                                <a href="{{ route('jobs.index', ['posting' => '24']) }}"
                                    class="text-blue-600 hover:underline">
                                    24 jam terakhir
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('jobs.index', ['posting' => '7hari']) }}"
                                    class="text-blue-600 hover:underline">
                                    7 hari terakhir
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('jobs.index') }}"
                                    class="text-blue-600 hover:underline">
                                    1 bulan terakhir
                                </a>
                            </li>
                        </ul>

                        <!-- Filter Waktu Pekerjaan -->
                        <h4 class="font-bold text-lg mb-2">Waktu Pekerjaan</h4>
                        <ul class="mb-4">
                            <li class="mb-1">
                                <a href="{{ route('jobs.index', ['waktu' => ['fulltime']]) }}"
                                    class="text-blue-600 hover:underline">
                                    Full-time
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('jobs.index', ['waktu' => ['freelance']]) }}"
                                    class="text-blue-600 hover:underline">
                                    Freelance
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('jobs.index', ['waktu' => ['parttime']]) }}"
                                    class="text-blue-600 hover:underline">
                                    Part-time
                                </a>
                            </li>
                        </ul>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full">
                        Terapkan Filter
                    </button>
                </form>
            </aside>

            <!-- Job Listings -->
            <div class="w-full md:w-3/4 px-4">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Hasil Pencarian</h2>

                @if(isset($message))
                <p class="text-center text-gray-700">{{ $message }}</p>
                @else
                @if($jobs->isEmpty())
                <p class="text-center text-gray-700">Tidak ada pekerjaan yang ditemukan.</p>
                @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($jobs as $job)
                    <div class="bg-white p-4 shadow-lg rounded-lg transition-transform transform hover:scale-105">
                        <!-- Job Image -->
                        @if($job->image)
                        <img src="{{ asset('storage/images/' . $job->image) }}" alt="Job Image" class="w-full h-48 object-cover rounded-lg mb-4">
                        @else
                        <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                        @endif

                        <!-- Job Details -->
                        <h3 class="text-xl font-semibold text-blue-600 mb-2">{{ $job->title }}</h3>
                        <p class="text-gray-700 mb-4">{{ Str::limit($job->description, 150) }}</p>
                        <p class="text-sm text-gray-500 mb-4">Kategori: {{ $job->category_name }}</p>
                        <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300">Lihat Detail</a>
                    </div>
                    @endforeach
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endsection