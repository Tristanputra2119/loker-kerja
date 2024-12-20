@extends('layouts.user')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex flex-wrap -mx-4">
        <!-- Sidebar Filter -->
        <div class="w-full lg:w-1/4 px-4">
            <form method="GET" action="{{ route('jobs.index') }}" class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-4">Filter Pekerjaan</h2>

                <!-- Filter Lokasi -->
                <div class="mb-6">
                    <h4 class="font-semibold text-gray-700 mb-2">Lokasi</h4>
                    <ul class="space-y-2">
                        @foreach ($locations as $location)
                        <li>
                            <input type="radio" id="lokasi_{{ $location }}" name="location" value="{{ $location }}"
                                {{ request('location') == $location ? 'checked' : '' }}>
                            <label for="lokasi_{{ $location }}" class="ml-2">{{ ucfirst($location) }}</label>
                        </li>
                        @endforeach
                        <li>
                            <input type="radio" id="lokasi_all" name="location" value=""
                                {{ request('location') == '' ? 'checked' : '' }}>
                            <label for="lokasi_all" class="ml-2">Semua</label>
                        </li>
                    </ul>
                </div>

                <!-- Filter Tanggal Posting -->
                <div class="mb-6">
                    <h4 class="font-semibold text-gray-700 mb-2">Tanggal Posting</h4>
                    <ul class="space-y-2">
                        <li>
                            <input type="radio" id="posting1" name="posting" value="24"
                                {{ request('posting') == '24' ? 'checked' : '' }}>
                            <label for="posting1" class="ml-2">24 jam terakhir</label>
                        </li>
                        <li>
                            <input type="radio" id="posting2" name="posting" value="7hari"
                                {{ request('posting') == '7hari' ? 'checked' : '' }}>
                            <label for="posting2" class="ml-2">7 hari terakhir</label>
                        </li>
                        <li>
                            <input type="radio" id="posting3" name="posting" value=""
                                {{ request('posting') == '' ? 'checked' : '' }}>
                            <label for="posting3" class="ml-2">Semua</label>
                        </li>
                    </ul>
                </div>

                <!-- Filter Jenis Pekerjaan -->
                <div class="mb-6">
                    <h4 class="font-semibold text-gray-700 mb-2">Waktu Pekerjaan</h4>
                    <ul class="space-y-2">
                        <li>
                            <input type="checkbox" id="Full-time" name="waktu[]" value="Full-time"
                                {{ in_array('Full-time', (array) request('waktu', [])) ? 'checked' : '' }}>
                            <label for="Full-time" class="ml-2">Full-time</label>
                        </li>
                        <li>
                            <input type="checkbox" id="freelance" name="waktu[]" value="freelance"
                                {{ in_array('freelance', (array) request('waktu', [])) ? 'checked' : '' }}>
                            <label for="freelance" class="ml-2">Freelance</label>
                        </li>
                    </ul>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full">
                    Terapkan Filter
                </button>
            </form>
        </div>

        <!-- Daftar Pekerjaan -->
        <div class="w-full lg:w-3/4 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse ($jobs as $job)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $job->title }}</h3>
                    <p class="text-sm text-gray-600 mb-2">Lokasi: {{ $job->location }}</p>
                    <p class="text-sm text-gray-600 mb-2">Kategori: {{ $job->category->name }}</p>
                    <p class="text-sm text-gray-600 mb-2">Perusahaan: {{ $job->company->name }}</p>
                    <p class="text-sm text-gray-600">Diposting: {{ $job->created_at->diffForHumans() }}</p>
                    <a href="{{ route('jobs.show', $job->id) }}"
                        class="block bg-green-600 text-white px-4 py-2 rounded-lg text-center mt-4">
                        Lihat Detail
                    </a>
                </div>
                @empty
                <div class="col-span-2 text-center text-gray-500">
                    <p>Maaf, tidak ada pekerjaan yang cocok dengan filter Anda.</p>
                </div>
                @endforelse
            </div>
            {{ $jobs->links() }}
        </div>
    </div>
</div>
@endsection