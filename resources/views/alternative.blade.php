@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Data Alternative</h1>
    <a href="{{ route('admin.data.alternative.create') }}" class="text-white float-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Tambah Alternative</a>
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
                <th scope="col" class="px-6 py-3">Kode </th>
                <th scope="col" class="px-6 py-3">Nama </th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alternatives as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->kode }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $item->nama }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.data.alternative.edit', $item->id) }}" class="text-blue-800">Edit</a> |
                    <form action="{{ route('admin.data.alternative.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-800">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="4">Data alternative tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection