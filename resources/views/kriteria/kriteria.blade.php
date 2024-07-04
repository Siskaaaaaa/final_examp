@extends('layouts.app')

@section('title', 'Data Kriteria')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Data Kriteria</h1>
    <a href="{{ route('admin.kriteria.create') }}" class="text-white float-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Tambah Kriteria</a>
    <hr />

    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Kode</th>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kriterias as $kriteria)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kriteria->kode }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kriteria->nama }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}" class="text-blue-800">Edit</a> |
                    <form action="{{ route('admin.kriteria.destroy', $kriteria->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-800">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="4">Data kriteria tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
