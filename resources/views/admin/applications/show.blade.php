@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Application Details</h2>

            <div class="space-y-4">
                <!-- Job Title -->
                <div>
                    <strong class="text-gray-600">Job Title:</strong>
                    <p class="text-gray-800">{{ $applications->job->title }}</p>
                </div>

                <!-- Applicant Name -->
                <div>
                    <strong class="text-gray-600">Applicant Name:</strong>
                    <p class="text-gray-800">{{ $applications->applicant_name }}</p>
                </div>

                <!-- Applicant Email -->
                <div>
                    <strong class="text-gray-600">Applicant Email:</strong>
                    <p class="text-gray-800">{{ $applications->applicant_email }}</p>
                </div>

                <!-- Message -->
                <div>
                    <strong class="text-gray-600">Message:</strong>
                    <p class="text-gray-800">{{ $applications->message }}</p>
                </div>

                <!-- Status -->
                <div>
                    <strong class="text-gray-600">Status:</strong>
                    <p class="text-gray-800">{{ $applications->status }}</p>
                </div>

                <!-- Applied At -->
                <div>
                    <strong class="text-gray-600">Applied At:</strong>
                    <p class="text-gray-800">{{ $applications->applied_at->diffforHumans() }}</p>
                </div>

                <!-- Created At -->
                <div>
                    <strong class="text-gray-600">Created At:</strong>
                    <p class="text-gray-800">{{ $applications->created_at->diffforHumans() }}</p>
                </div>

                <!-- Updated At -->
                <div>
                    <strong class="text-gray-600">Updated At:</strong>
                    <p class="text-gray-800">{{ $applications->updated_at->diffforHumans()}}</p>
                </div>

                <!-- ID -->
                <div>
                    <strong class="text-gray-600">Application ID:</strong>
                    <p class="text-gray-800">{{ $applications->id }}</p>
                </div>
            </div>

            <div class="mt-6">
                <!-- Back Button -->
                <a href="{{ route('applications.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">Back to Applications List</a>
            </div>
        </div>
    </div>
@endsection
