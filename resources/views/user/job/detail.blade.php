@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8 px-6">
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
                                <a href="{{ route('company.profile', $company->id) }}" class="text-blue-500 underline">
                                    {{ $company->company_name }}
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

                <!-- Menampilkan status lamaran -->
                @if ($applicationStatus)
                    <div class="mt-8">
                        @if($applicationStatus == 'Accepted')
                            <p class="text-green-600">Selamat Anda diterima diperusahaan ini, kami akan menghubungi anda secepat mungkin! </p>
                        @elseif($applicationStatus == 'Rejected')
                            <p class="text-red-600">Sayangnya lamaran Anda ditolak. Anda dapat mencoba melamar lagi.</p>
                            <!-- Form lamaran ulang -->
                            <form method="POST" action="{{ route('user.job.apply', $job->id) }}" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                                    <textarea
                                        id="message"
                                        name="message"
                                        rows="4"
                                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                                    ></textarea>
                                </div>
                                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    Kirim Lamaran Ulang
                                </button>
                            </form>
                        @endif
                    </div>
                @else
                    <!-- Form Apply -->
                    <div class="mt-8 space-y-4">
                        <h2 class="text-lg font-medium text-gray-900">Apply untuk Pekerjaan ini</h2>
                        <form method="POST" action="{{ route('user.job.apply', $job->id) }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="applicant_name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                                    value="{{ Auth::user()->name }}"
                                    readonly
                                >
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="applicant_email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                                    value="{{ Auth::user()->email }}"
                                    readonly
                                >
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="4"
                                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2">
                                </textarea>
                            </div>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                                Kirim Lamaran
                            </button>
                        </form>
                    </div>
                @endif
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
    </div>
@endsection
