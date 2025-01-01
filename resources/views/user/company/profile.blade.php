@extends('layouts.user')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center space-x-4">
            @if($company && $company->logo)
            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="w-24 h-24 object-cover rounded">
            @else
            <img src="https://via.placeholder.com/150" alt="Default Logo" class="w-24 h-24 object-cover rounded-full">
            @endif
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $company->company_name }}</h1>
                <p class="text-sm text-gray-600">Industri: {{ $company->industry ?? 'Tidak disebutkan' }}</p>
                <p class="text-sm text-gray-600">Website:
                    @if($company->website)
                    <a href="{{ $company->website }}" class="text-blue-500 underline" target="_blank">{{ $company->website }}</a>
                    @else
                    Tidak tersedia
                    @endif
                </p>
                <p class="text-sm text-gray-600">Alamat: {{ $company->address ?? 'Tidak tersedia' }}</p>
                <p class="text-sm text-gray-600">Telepon: {{ $company->phone ?? 'Tidak tersedia' }}</p>
            </div>
        </div>

        <hr class="my-6">

        <div>
            <h2 class="text-lg font-semibold text-gray-800">Deskripsi Perusahaan</h2>
            <p class="text-gray-700">{{ $company->description ?? 'Tidak ada deskripsi yang tersedia.' }}</p>
        </div>

        <hr class="my-6">

        <div>
            <h2 class="text-lg font-semibold text-gray-800">Pekerjaan yang Tersedia</h2>
            @if($company->jobs->count() > 0)
            <ul class="space-y-4">
                @foreach($company->jobs as $job)
                <li class="border p-4 rounded-lg">
                    <a href="{{ route('job.show', $job->id) }}" class="text-blue-500 font-semibold text-lg hover:underline">{{ $job->title }}</a>
                    <p class="text-sm text-gray-600">Lokasi: {{ $job->location }}</p>
                </li>
                @endforeach
            </ul>
            @else
            <p class="text-gray-500">Belum ada pekerjaan yang tersedia.</p>
            @endif
        </div>
    </div>
</div>
@endsection