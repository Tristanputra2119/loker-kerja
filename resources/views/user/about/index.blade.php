@extends('layouts.user')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-blue-600 leading-tight">About Us</h1>
            <p class="text-lg text-gray-700 mt-6 max-w-3xl mx-auto">
                Empowering students and graduates to achieve their dream careers through exceptional guidance and industry partnerships.
            </p>
        </div>

        <!-- Introduction Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h2 class="text-3xl font-semibold text-blue-600 mb-6">Who We Are</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    At Primakara Career Centre (PCC), we bridge the gap between education and the professional world by providing unparalleled career guidance, job opportunities, and skill development programs. Our mission is to build a community where every student can thrive.
                </p>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Through collaborations with industry leaders, hands-on workshops, and tailored internship programs, we ensure that students are well-prepared to excel in their careers.
                </p>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('img/profil.jpg') }}" alt="About Us Image" class="w-full max-w-md rounded-lg shadow-xl transform transition-all duration-300 hover:scale-105">
            </div>
        </div>

        <!-- Vision Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-semibold text-blue-600 mb-6">Our Vision</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                To be a leading career development center recognized for fostering excellence and innovation in education and career services.
            </p>
        </div>

        <!-- Mission Section -->
        <div>
            <h2 class="text-3xl font-semibold text-blue-600 mb-6">Our Mission</h2>
            <ul class="space-y-6 text-lg text-gray-700">
                <li class="flex items-start">
                    <span class="text-blue-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    Provide career counseling and job placement services to students and graduates.
                </li>
                <li class="flex items-start">
                    <span class="text-blue-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    Collaborate with industry leaders to offer real-world opportunities.
                </li>
                <li class="flex items-start">
                    <span class="text-blue-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    Equip students with essential skills to thrive in a competitive job market.
                </li>
                <li class="flex items-start">
                    <span class="text-blue-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    Foster a supportive community that encourages continuous learning and growth.
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection