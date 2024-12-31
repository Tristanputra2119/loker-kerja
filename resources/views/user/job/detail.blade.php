@extends('layouts.user')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex flex-wrap -mx-4">
        <!-- Detail Pekerjaan -->
        <div class="w-full lg:w-3/4 px-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-start space-x-4">
                    @if($company && $company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="w-24 h-24 object-cover rounded">
                    @else
                    <img src="https://via.placeholder.com/150" alt="Default Logo" class="w-24 h-24 object-cover rounded-full">
                    @endif
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h1>
                        <p class="text-sm text-gray-600">Perusahaan:
                            <a href="{{ route('company.profile', $job->company->id) }}" class="text-blue-500 underline">
                                {{ $job->company->company_name }}
                            </a>
                        </p>
                        <p class="text-sm text-gray-600">Kategori: {{ $job->category->name }}</p>
                        <p class="text-sm text-gray-600">Lokasi: {{ $job->location }}</p>
                        <p class="text-sm text-gray-600">Diposting: {{ $job->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <hr class="my-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Deskripsi Pekerjaan</h2>
                    <p class="text-gray-700">{{ $job->description }}</p>
                </div>
                <div class="mt-4">
                    <h2 class="text-lg font-semibold text-gray-800">Kualifikasi</h2>
                    <p class="text-gray-700">{{ $job->requirements }}</p>
                </div>
                <div class="mt-4">
                    <h2 class="text-lg font-semibold text-gray-800">Gaji</h2>
                    <p class="text-gray-700">{{ $job->salary ?? 'Negosiasi' }}</p>
                </div>
            </div>

            <!-- Form Apply -->
            <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Apply untuk Pekerjaan ini</h2>
                <form method="POST" action="{{ route('user.job.apply', $job->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Kirim Lamaran
                    </button>
                </form>
            </div>
        </div>

        <!-- Testimoni -->
        <div class="w-full lg:w-1/4 px-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Testimoni</h2>
                @forelse ($testimonials as $testimonial)
                <div class="mb-4">
                    <p class="text-sm text-gray-700">"{{ $testimonial->message }}"</p>
                    <p class="text-sm text-gray-600 text-right">- {{ $testimonial->user_name }}</p>
                </div>
                @empty
                <p class="text-gray-500">Belum ada testimoni untuk pekerjaan ini.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Profil Pengguna -->
    <div class="mt-8 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Profil Pengguna</h2>
        <div class="flex items-center space-x-4">
            <!-- Foto Profil -->
            @if(Auth::user()->profile_picture)
            <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="User Profile" class="w-24 h-24 object-cover rounded-full">
            @else
            <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" alt="User Profile" class="w-24 h-24 object-cover rounded-full">
            @endif
            <div>
                <h3 class="text-xl font-bold text-gray-800">{{ Auth::user()->name }}</h3>
                <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                <p class="text-sm text-gray-600">{{ Auth::user()->bio ?? 'Tidak ada bio yang ditambahkan' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection