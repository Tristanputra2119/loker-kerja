@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Application Details</h2>

        <div class="space-y-4">
            <!-- Job Title -->
            <div>
                <strong class="text-gray-600">Job Title:</strong>
                <p class="text-gray-800">{{ $application->job->title }}</p>
            </div>

            <!-- Applicant Name -->
            <div>
                <strong class="text-gray-600">Applicant Name:</strong>
                <p class="text-gray-800">{{ $application->applicant_name }}</p>
            </div>

            <!-- Applicant Email -->
            <div>
                <strong class="text-gray-600">Applicant Email:</strong>
                <p class="text-gray-800">{{ $application->applicant_email }}</p>
            </div>

            <!-- Message -->
            <div>
                <strong class="text-gray-600">Message:</strong>
                <p class="text-gray-800">{{ $application->message }}</p>
            </div>

            <!-- Status -->
            <div>
                <strong class="text-gray-600">Status:</strong>
                <p class="text-gray-800">{{ $application->status }}</p>
            </div>

            <!-- Applied At -->
            <div>
                <strong class="text-gray-600">Applied At:</strong>
                <p class="text-gray-800">{{ $application->applied_at->diffForHumans() }}</p>
            </div>

            <!-- Created At -->
            <div>
                <strong class="text-gray-600">Created At:</strong>
                <p class="text-gray-800">{{ $application->created_at->diffForHumans() }}</p>
            </div>

            <!-- Updated At -->
            <div>
                <strong class="text-gray-600">Updated At:</strong>
                <p class="text-gray-800">{{ $application->updated_at->diffForHumans() }}</p>
            </div>

            <!-- ID -->
            <div>
                <strong class="text-gray-600">Application ID:</strong>
                <p class="text-gray-800">{{ $application->id }}</p>
            </div>
        </div>

        <div class="mt-6">
            <!-- Back Button -->
            <a href="{{ route('applications.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">Back to Applications List</a>
        </div>
    </div>
</div>
@endsection