@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Create Job</h2>

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Job Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="requirements" class="block text-gray-700 font-bold mb-2">Requirements</label>
                <textarea id="requirements" name="requirements" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('requirements') }}</textarea>
                @error('requirements')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-gray-700 font-bold mb-2">Salary</label>
                <input type="text" id="salary" name="salary" value="{{ old('salary') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('salary')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('location')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="job_category_id" class="block text-gray-700 font-bold mb-2">Category</label>
                <select id="job_category_id" name="job_category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('job_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('job_category_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Job</button>
            </div>
        </form>
    </div>
</div>
@endsection
