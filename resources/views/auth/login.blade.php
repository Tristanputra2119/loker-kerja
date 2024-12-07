@extends('layouts.app')

@section('content')
<div class="relative flex justify-center items-center min-h-screen overflow-hidden">
    <!-- Gambar Samping -->
    <img src="{{ asset('img/Login.png') }}" alt="Login Image" class="w-full h-screen object-cover">

    <!-- Form Login -->
    <div class="w-full lg:w-1/2 px-8 py-10 bg-white bg-opacity-90 rounded-lg shadow-lg backdrop-blur-sm h-screen flex items-center justify-center">
        <div class="w-full max-w-lg"> <!-- Memperbesar lebar form -->
            <h2 class="text-center text-gray-800 text-3xl font-semibold mb-6">Masuk ke Primakara Career Center</h2>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="password" required autocomplete="current-password">
                    @error('password')
                    <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-4 flex items-center">
                    <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="text-gray-700" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        {{ __('Login') }}
                    </button>
                </div>

                <!-- Forgot Password Link -->
                <div class="text-center">
                    @if (Route::has('password.request'))
                    <a class="text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection