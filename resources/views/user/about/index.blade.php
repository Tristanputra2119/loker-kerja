@extends('layouts.user')

@section('content')
<div class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-blue-600">About Us</h1>
            <p class="text-lg text-gray-700 mt-4 max-w-3xl mx-auto">
                Empowering students and graduates to achieve their dream careers through exceptional guidance and industry partnerships.
            </p>
        </div>

        <!-- Introduction Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-12">
            <div>
                <h2 class="text-2xl font-bold text-blue-600 mb-4">Who We Are</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    At Primakara Career Centre (PCC), we strive to bridge the gap between education and the professional world by providing unparalleled career guidance, job opportunities, and skill development programs. Our commitment is to foster a community where every student can thrive.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed mt-4">
                    Through partnerships with leading industries, hands-on workshops, and tailored internship programs, PCC ensures that students are equipped to excel in their chosen career paths.
                </p>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('img/profil.jpg') }}" alt="About Us Image" class="w-full max-w-sm rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Vision Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Our Vision</h2>
            <p class="text-gray-700 text-lg leading-relaxed">
                To be a leading career development center recognized for fostering excellence and innovation in education and career services.
            </p>
        </div>

        <!-- Mission Section -->
        <div>
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Our Mission</h2>
            <ul class="space-y-3">
                <li class="flex items-start">
                    <span class="text-blue-600 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <p class="text-gray-700 text-lg leading-relaxed">Provide career counseling and job placement services to students and graduates.</p>
                </li>
                <li class="flex items-start">
                    <span class="text-blue-600 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <p class="text-gray-700 text-lg leading-relaxed">Collaborate with industry leaders to offer real-world opportunities.</p>
                </li>
                <li class="flex items-start">
                    <span class="text-blue-600 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <p class="text-gray-700 text-lg leading-relaxed">Equip students with essential skills to thrive in a competitive job market.</p>
                </li>
                <li class="flex items-start">
                    <span class="text-blue-600 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <p class="text-gray-700 text-lg leading-relaxed">Foster a supportive community that encourages continuous learning and growth.</p>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
