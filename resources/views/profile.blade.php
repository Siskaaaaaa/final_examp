@extends('layouts.app')

@section('title', 'Profil')

@section('contents')
<div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
    <div class="p-6">
        <h2 class="text-3xl font-bold text-center mb-6">Profil Pengguna</h2>
        <form method="POST" enctype="multipart/form-data" action="">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 ease-in-out" readonly />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" name="email" type="text" value="{{ auth()->user()->email }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-300 ease-in-out" readonly />
            </div>
        </form>
    </div>
</div>
@endsection
