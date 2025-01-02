@extends('layouts.user')

@section('content')
<div class="container mx-auto py-8 px-6"> <!-- Tambahkan px-6 untuk padding horizontal -->
    <div class="flex flex-wrap -mx-4">
        <!-- Detail Pekerjaan -->
        <div class="w-full lg:w-3/4 px-4">
            <div class="space-y-6">
                <div class="flex items-start space-x-4">
                    @if($company && $company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="w-24 h-24 object-cover rounded">
                    @else
                    <img src="https://via.placeholder.com/150" alt="Default Logo" class="w-24 h-24 object-cover rounded-full">
                    @endif
                    <div>
                        <h1 class="text-3xl font-semibold text-gray-900">{{ $job->title }}</h1>
                        <p class="text-sm text-gray-700">Perusahaan:
                            <a href="{{ route('company.profile', $job->company->id) }}" class="text-blue-500 underline">
                                {{ $job->company->company_name }}
                            </a>
                        </p>
                        <p class="text-sm text-gray-700">Kategori: {{ $job->category->name }}</p>
                        <p class="text-sm text-gray-700">Lokasi: {{ $job->location }}</p>
                        <p class="text-sm text-gray-700">Diposting: {{ $job->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">Deskripsi Pekerjaan</h2>
                    <p class="text-gray-800 leading-relaxed">{{ $job->description }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">Kualifikasi</h2>
                    <p class="text-gray-800 leading-relaxed">{{ $job->requirements }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">Gaji</h2>
                    <p class="text-gray-800">{{ $job->salary ?? 'Negosiasi' }}</p>
                </div>
            </div>

            <!-- Form Apply -->
            <div class="mt-8 space-y-4">
                <h2 class="text-lg font-medium text-gray-900">Apply untuk Pekerjaan ini</h2>
                <form method="POST" action="{{ route('user.job.apply', $job->id) }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2" required>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Kirim Lamaran
                    </button>
                </form>
            </div>
        </div>

        <!-- Testimoni -->
        <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Testimoni</h2>
            @forelse ($job->testimonials as $testimonial)
            <div class="mb-6">
                <p class="text-sm text-gray-800 italic">"{{ $testimonial->message }}"</p>
                <p class="text-sm text-gray-600 text-right">- {{ $testimonial->user_name }}</p>
            </div>
            @empty
            <p class="text-gray-600">Belum ada testimoni untuk pekerjaan ini.</p>
            @endforelse
        </div>
    </div>

    <!-- Profil Pengguna -->
    <div class="mt-12 flex items-center space-x-6">
        @if(auth()->check() && auth()->user()->profile_picture)
        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto Profil" class="w-16 h-16 rounded-full">
        @else
        <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="w-16 h-16 rounded-full">
        @endif
        <div>
            <h3 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h3>
            <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
            <p class="text-sm text-gray-600">{{ Auth::user()->bio ?? 'Tidak ada bio yang ditambahkan' }}</p>
        </div>
    </div>
</div>
@endsection
