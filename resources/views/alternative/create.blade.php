<!-- resources/views/alternative/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Alternative')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Tambah Alternative</h1>
    <hr />

    <form action="{{ route('admin.data.alternative.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="kode" class="block text-sm font-medium text-gray-700">Kode Alternative</label>
            <input type="text" name="kode" id="kode" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Alternative</label>
            <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800">Simpan</button>
            <a href="{{ route('admin.data.alternative') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection