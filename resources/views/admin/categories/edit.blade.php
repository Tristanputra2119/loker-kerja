@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-4">
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

    <form action="{{ route('job_categories.update', $jobCategory) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Category Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $jobCategory->name) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-gray-700 font-bold mb-2">Slug</label>
            <input
                type="text"
                id="slug"
                name="slug"
                value="{{ old('slug', $jobCategory->slug) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('slug')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('job_categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection