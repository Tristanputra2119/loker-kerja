@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-semibold">Get in Touch with Us</h2>
        <p class="mt-4 text-lg sm:text-xl">We’re here to assist you with any questions or inquiries. Feel free to reach out to us.</p>
    </div>
</section>

<!-- Contact Information Section -->
<section class="py-20">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-16">
        <!-- Address Section -->
        <div class="space-y-6">
            <h3 class="text-3xl font-semibold text-gray-800">Our Office Location</h3>
            <p class="text-lg text-gray-600">Find us at our office in Bali or get in touch through the following channels:</p>

            <ul class="text-gray-600 space-y-5">
                <li class="flex items-center space-x-4">
                    <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                    <span>1234 Main Street, Bali, Indonesia</span>
                </li>
                <li class="flex items-center space-x-4">
                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                    <span>Email: <a href="mailto:info@pcc.ac.id" class="hover:text-blue-500">info@pcc.ac.id</a></span>
                </li>
                <li class="flex items-center space-x-4">
                    <i class="fas fa-phone-alt text-blue-600 text-xl"></i>
                    <span>Phone: <a href="tel:+62123456789" class="hover:text-blue-500">+62 123 456 789</a></span>
                </li>
            </ul>
        </div>

        <!-- Map Section -->
        <div class="relative">
            <iframe class="rounded-lg shadow-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.249143351775!2d139.69171271531928!3d35.68948762437352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bbaccfefb27%3A0xa040ef2f05187091!2sTokyo%20Tower!5e0!3m2!1sen!2sus!4v1600126753784!5m2!1sen!2sus"
                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
</section>

<!-- Additional Contact Info Section -->
<section class="bg-gray-50 py-20">
    <div class="container mx-auto text-center">
        <h3 class="text-3xl font-semibold text-gray-800">Business Hours</h3>
        <p class="mt-4 text-lg text-gray-600">We are available to assist you during the following hours:</p>

        <div class="mt-8">
            <ul class="text-left mx-auto max-w-2xl text-lg text-gray-600 space-y-4">
                <li class="flex justify-between">
                    <span>Monday - Friday:</span>
                    <span>9:00 AM - 6:00 PM</span>
                </li>
                <li class="flex justify-between">
                    <span>Saturday:</span>
                    <span>10:00 AM - 3:00 PM</span>
                </li>
                <li class="flex justify-between">
                    <span>Sunday:</span>
                    <span>Closed</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="py-20">
    <div class="container mx-auto text-center">
        <h3 class="text-3xl font-semibold text-gray-800">Follow Us on Social Media</h3>
        <p class="mt-4 text-lg text-gray-600">Stay connected and get the latest updates by following us on social media:</p>

        <div class="mt-8 flex justify-center space-x-8">
            <a href="https://www.facebook.com" target="_blank" class="text-blue-600 hover:text-blue-800 text-2xl">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" class="text-blue-600 hover:text-blue-800 text-2xl">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" class="text-blue-600 hover:text-blue-800 text-2xl">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank" class="text-blue-600 hover:text-blue-800 text-2xl">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
</section>
@endsection