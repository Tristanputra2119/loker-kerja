@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Daftar Perusahaan</h2>

    <!-- Pesan sukses -->
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
    @endif

    @if(auth()->user()->role === 'admin')
    <div class="mb-4">
        <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Tambah Perusahaan</a>
    </div>
    @endif
    <!-- Tabel Daftar Perusahaan -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Nama Perusahaan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Industri</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Website</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($companies as $company)
                <tr class="hover:bg-gray-50 transition duration-300">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $company->id }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $company->company_name }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $company->industry }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="{{ $company->website }}" class="text-blue-500 hover:text-blue-700" target="_blank">{{ $company->website }}</a>
                    </td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="{{ route('companies.edit', $company->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a> |
                        @if(auth()->user()->role === 'admin')
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
