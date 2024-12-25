@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Perusahaan</h1>
        <p class="text-gray-600">Selamat datang kembali, {{ auth()->user()->company->company_name }}!</p>
    </div>

    <!-- Kartu Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Total Pekerjaan</h2>
            <p class="text-4xl font-bold text-blue-600 mt-2">{{ $totalJobs }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Total Pelamar</h2>
            <p class="text-4xl font-bold text-green-600 mt-2">{{ $totalApplicants }}</p>
        </div>
    </div>

    <!-- Daftar Pekerjaan -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800">Pekerjaan yang Dibuat</h2>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left text-gray-600">Judul Pekerjaan</th>
                        <th class="py-2 px-4 text-left text-gray-600">Kategori</th>
                        <th class="py-2 px-4 text-left text-gray-600">Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $job->title }}</td>
                        <td class="py-2 px-4">{{ $job->category->name ?? 'N/A' }}</td>
                        <td class="py-2 px-4">{{ $job->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pelamar Terbaru -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800">Pelamar Terbaru</h2>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left text-gray-600">Nama Pelamar</th>
                        <th class="py-2 px-4 text-left text-gray-600">Pekerjaan yang Dilamar</th>
                        <th class="py-2 px-4 text-left text-gray-600">Dilamar Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentApplicants as $application)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $application->user->name }}</td>
                        <td class="py-2 px-4">{{ $application->job->title }}</td>
                        <td class="py-2 px-4">{{ $application->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
