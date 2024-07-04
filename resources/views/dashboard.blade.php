@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<div class="container mx-auto mt-10">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="font-bold text-3xl text-gray-800 mb-4">Selamat Datang di Sistem Pendukung Keputusan Pemilihan Mitra</h1>
        <p class="text-gray-600 mb-4">
            Sistem ini dirancang menggunakan Metode AHP (Analytic Hierarchy Process) untuk membantu Anda memilih mitra terbaik untuk bisnis Anda. Nikmati kemudahan dalam menganalisis dan membandingkan kriteria yang penting bagi keberhasilan kerjasama Anda.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kotak 1 -->
            <div class="bg-blue-100 p-6 rounded-lg shadow-lg flex items-center">
                <div class="mr-4">
                    <i class="fas fa-handshake fa-3x text-blue-700"></i>
                </div>
                <div>
                    <h2 class="font-semibold text-2xl text-blue-700 mb-2">Pilih Mitra Terbaik</h2>
                    <p class="text-gray-600">
                        Gunakan metode terstruktur untuk memilih mitra yang sesuai dengan kebutuhan dan prioritas bisnis Anda.
                    </p>
                </div>
            </div>
            <!-- Kotak 2 -->
            <div class="bg-green-100 p-6 rounded-lg shadow-lg flex items-center">
                <div class="mr-4">
                    <i class="fas fa-info-circle fa-3x text-green-700"></i>
                </div>
                <div>
                    <h2 class="font-semibold text-2xl text-green-700 mb-2">Analisis yang Mendalam</h2>
                    <p class="text-gray-600">
                        Dapatkan wawasan mendalam melalui perbandingan kriteria yang relevan untuk setiap mitra potensial.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Optional: Include TailwindCSS if not already included in layouts.app -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
@endsection
