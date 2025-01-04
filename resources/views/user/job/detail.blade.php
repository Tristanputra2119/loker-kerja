@extends('layouts.user')

@section('content')
<div class="container mx-auto py-12 px-6">
    <div class="flex flex-wrap -mx-4">
        <!-- Kartu Konten Pekerjaan -->
        <div class="w-full lg:w-2/3 px-4 mb-8 lg:mb-0">
            <div class="bg-white shadow-lg rounded-lg p-8 space-y-6">
                <div class="flex items-start space-x-6">
                    @if($company && $company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="w-28 h-28 object-cover rounded-full shadow-md">
                    @else
                    <img src="https://via.placeholder.com/150" alt="Default Logo" class="w-28 h-28 object-cover rounded-full shadow-md">
                    @endif
                    <div>
                        <h1 class="text-4xl font-semibold text-gray-900">{{ $job->title }}</h1>
                        <p class="text-lg text-gray-700">Perusahaan:
                            <a href="{{ route('company.profile', $company->id) }}" class="text-blue-500 hover:underline">
                                {{ $company->company_name }}
                            </a>
                        </p>
                        <p class="text-lg text-gray-700">Kategori: {{ $job->category->name }}</p>
                        <p class="text-lg text-gray-700">Lokasi: {{ $job->location }}</p>
                        <p class="text-lg text-gray-700">Diposting: {{ $job->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-900">Deskripsi Pekerjaan</h2>
                    <p class="text-gray-800 text-lg leading-relaxed">{{ $job->description }}</p>
                </div>
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-900">Kualifikasi</h2>
                    <p class="text-gray-800 text-lg leading-relaxed">{{ $job->requirements }}</p>
                </div>
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-900">Gaji</h2>
                    <p class="text-gray-800 text-lg">{{ $job->salary ?? 'Negosiasi' }}</p>
                </div>

                <!-- Form Apply -->
                @if (!$applicationStatus)
                <div class="space-y-6 mt-8">
                    <h2 class="text-2xl font-semibold text-gray-900">Apply untuk Pekerjaan ini</h2>
                    <form method="POST" action="{{ route('user.job.apply', $job->id) }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input
                                type="text"
                                id="name"
                                name="applicant_name"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                value="{{ Auth::user()->name }}"
                                readonly>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="applicant_email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                value="{{ Auth::user()->email }}"
                                readonly>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-500">
                            Kirim Lamaran
                        </button>
                    </form>
                </div>
                @else
                <!-- Status Lamaran -->
                <div class="mt-8 p-6 bg-green-50 border-l-4 border-green-500 text-gray-800 rounded-lg">
                    @if($applicationStatus == 'Accepted')
                    <p class="font-medium">Selamat Anda diterima di perusahaan ini, kami akan menghubungi Anda segera!</p>
                    @elseif($applicationStatus == 'Rejected')
                    <p class="font-medium text-red-600">Sayangnya, lamaran Anda ditolak. Anda dapat mencoba melamar lagi.</p>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection