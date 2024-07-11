@extends('layouts.user')
 
@section('title', 'Home')
 
@section('contents')
<header class="bg-gradient-to-r from-blue-500 to-indigo-600 shadow-lg">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
        <h1 class="text-4xl font-extrabold">
            Welcome to Our Home Page
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-300 rounded-lg h-96 flex items-center justify-center bg-white shadow-lg">
                <h2 class="text-2xl font-semibold text-gray-700">Homepage Content Goes Here</h2>
            </div>
        </div>
        <div class="flex justify-center mt-8">
            <a href="{{ route('about') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-bold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Learn More About Us
            </a>
            <a href="{{ route('contact') }}" class="ml-4 inline-block px-6 py-3 bg-green-600 text-white font-bold rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                Contact Us
            </a>
        </div>
    </div>
</main>
@endsection
