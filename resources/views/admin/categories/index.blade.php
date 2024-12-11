@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Categories</h1>
        <a href="{{ route('job_categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Create Category
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow rounded p-4">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Slug</th>
                    <th class="px-4 py-2 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2">{{ $category->slug }}</td>
                    <td class="px-4 py-2 text-right">
                        <a href="{{ route('job_categories.edit', $category) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('job_categories.destroy', $category) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
