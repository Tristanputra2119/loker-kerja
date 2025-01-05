@extends('layouts.user')

@section('content')
<div class="container mx-auto py-8 px-6">
    <div class="flex flex-wrap -mx-4">
        <!-- Kartu Konten Pekerjaan -->
        <div class="w-full lg:w-3/4 px-4">
            <div class="card p-6 shadow-lg rounded-lg bg-white">
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
                @if ($applicationStatus === null)
                <!-- Form Apply -->
                <div class="mt-8 space-y-4">
                    <h2 class="text-lg font-medium text-gray-900">Apply untuk Pekerjaan ini</h2>
                    <form method="POST" action="{{ route('user.job.apply', $job->id) }}" class="space-y-4" id="applyForm">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input
                                type="text"
                                id="name"
                                name="applicant_name"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                                value="{{ Auth::user()->name }}"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="applicant_email"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                                value="{{ Auth::user()->email }}"
                                required>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Kirim Lamaran
                        </button>
                    </form>
                </div>
                @elseif ($applicationStatus === 'Pending')
                <div class="mt-8">
                    <p class="text-yellow-600">Lamaran Anda sedang diperiksa, harap bersabar.</p>
                </div>
                @elseif ($applicationStatus === 'Accepted')
                <div class="mt-8">
                    <p class="text-green-600">Selamat Anda diterima di perusahaan ini</p>
                </div>
                @elseif ($applicationStatus === 'Rejected')
                <div class="mt-8">
                    <p class="text-red-600">Sayangnya lamaran Anda ditolak. Anda dapat mencoba melamar lagi.</p>
                    <!-- Form Apply Ulang jika ditolak -->
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
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="applicant_email"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                                value="{{ Auth::user()->email }}"
                                required>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 leading-tight resize-none"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Kirim Lamaran Ulang
                        </button>
                    </form>
                </div>
                @endif
                <p  class=" text-green-700">Status Lamaran: {{ $applicationStatus }}</p>
            </div>
        </div>

        <!-- Testimonial Card -->
        <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
            <div class="card p-6 shadow-lg rounded-lg bg-white">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Testimoni</h2>

                @forelse ($testimonials as $testimonial)
                <div class="mb-6">
                    <p class="text-sm text-gray-800 italic">"{{ $testimonial->message }}"</p>
                    <p class="text-sm text-gray-600 text-right">- {{ $testimonial->user->name }}</p>
                </div>
                @empty
                <p class="text-red-600">Belum ada testimoni untuk pekerjaan ini.</p>
                @endforelse

                <!-- Pagination Links -->
                <div class="mt-6 px-6">
                    <nav aria-label="Page navigation">
                        <ul class="flex justify-center items-center space-x-4">
                            <!-- Previous Page -->
                            <li>
                                @if ($testimonials->onFirstPage())
                                <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-lg cursor-not-allowed">&lt;&lt;</span>
                                @else
                                <a href="{{ $testimonials->previousPageUrl() }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">&lt;&lt;</a>
                                @endif
                            </li>

                            <!-- Page Number Links -->
                            @foreach ($testimonials->getUrlRange(1, $testimonials->lastPage()) as $page => $url)
                            <li>
                                @if ($page == $testimonials->currentPage())
                                <span class="px-4 py-2 text-white bg-blue-600 rounded-lg">{{ $page }}</span>
                                @else
                                <a href="{{ $url }}" class="px-4 py-2 text-blue-600 bg-white border border-blue-600 rounded-lg hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">{{ $page }}</a>
                                @endif
                            </li>
                            @endforeach

                            <!-- Next Page -->
                            <li>
                                @if ($testimonials->hasMorePages())
                                <a href="{{ $testimonials->nextPageUrl() }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">&gt;&gt;</a>
                                @else
                                <span class="px-4 py-2 text-gray-500 bg-gray-200 rounded-lg cursor-not-allowed">&gt;&gt;</span>
                                @endif
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Submit Testimonial Form -->
                @if ($applicationStatus === 'Accepted')
                @auth
                <form method="POST" action="{{ route('user.testimonial.store', $job->id) }}" class="space-y-4 mt-6">
                    @csrf
                    <div>
                        <label for="testimonial" class="block text-sm font-medium text-gray-700">Tulis Testimoni</label>
                        <textarea
                            id="testimonial"
                            name="message"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2"
                            placeholder="Bagikan pengalaman Anda tentang pekerjaan ini..."
                            required></textarea>
                    </div>
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Kirim Testimoni
                    </button>
                </form>
                @else
                <p class="text-sm text-gray-700 mt-6">Silakan <a href="{{ route('login') }}" class="text-blue-500 underline">login</a> untuk memberikan testimoni.</p>
                @endauth
                @else
                <p class="text-sm text-gray-700 mt-6">Anda hanya dapat memberikan testimoni setelah lamaran diterima.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Alert setelah form submit -->
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@endsection