<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <style>
        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Styling tambahan */
        .hero-section {
            animation: fadeIn 2s ease-in-out;
        }

        .section {
            animation: slideIn 1s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-white font-bold text-xl">
                        Pemilihan Mitra AHP
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ url('/') }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            <a href="#about" class="nav-about text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tentang Kami</a>
                            <a href="#contact" class="nav-contact text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Kontak</a>
                            <a href="#perhitungan-spk" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Perhitungan SPK AHP</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        @if (Route::has('login'))
                            @auth
                            <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            <div x-data="{show: false}" x-on:click.away="show = false" class="ml-3 relative">
                            <div>
                                <button x-on:click="show = !show" type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center justify-center text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <span>SPK</span>
                                </button>
                            </div>
                                <div x-show="show" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div>
                            </div>
                            @else
                            @endauth
                            @endif
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ url('/') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#about" class="nav-about text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="#contact" class="nav-contact text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="#perhitungan-spk" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Perhitungan SPK</a>
            </div>
        </div>
    </nav>

   <!-- Hero Section -->
    <div class="hero-section bg-gray-400 h-screen flex items-center justify-center text-white text-center">
        <div>
            <h2 class="text-5xl font-bold mb-4">Selamat Datang di Sistem Pendukung Keputusan</h2>
            <p class="text-xl">Menggunakan Metode AHP untuk Keputusan yang Lebih Baik</p>
            <div class="mt-6">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-6 py-3 rounded-md text-lg">Masuk</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 bg-green-500 text-white px-6 py-3 rounded-md text-lg">Daftar</a>
                @endif
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="section bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tentang Kami</h2>
            <p class="text-gray-700 text-center">
                Kami adalah tim yang terdiri dari coder dan desainer yang berdedikasi untuk menyediakan solusi terbaik dengan menggunakan metode Analytic Hierarchy Process (AHP). 
                AHP adalah teknik yang membantu dalam pengambilan keputusan dengan membagi masalah kompleks menjadi bagian-bagian yang lebih sederhana dan menyusun prioritas di antara kriteria yang berbeda.
            </p>
        </div>
    </div>

 <!-- Bagian Kontak -->
<div id="contact" class="section bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Hubungi Kami</h2>
        <p class="text-gray-700 text-center mb-8">Punya pertanyaan? Hubungi kami.</p>
        <form id="contact-form" class="max-w-lg mx-auto">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" placeholder="Nama Anda" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Email Anda" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Pesan</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message" placeholder="Pesan Anda" required></textarea>
            </div>
            <div class="text-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</div>
<!-- JavaScript untuk pengiriman formulir -->
<script>
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault();
// Contoh menggunakan Node.js dengan Nodemailer
        cconst express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const cors = require('cors');

const app = express();
const port = 3000;

app.use(bodyParser.json());
app.use(cors()); // Tambahkan CORS agar bisa diakses dari client

// Endpoint untuk mengirim email
app.post('/send-email', (req, res) => {
    const { name, email, message } = req.body;

    // Konfigurasi Nodemailer untuk mengirim email
    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'ika92315@gmail.com',  // Ganti dengan alamat email Gmail Anda
            pass: 'yourpassword'  // Ganti dengan password atau password aplikasi khusus
        }
    });

    // Konten email yang akan dikirim
    const mailOptions = {
        from: 'ika92315@gmail.com',  // Alamat pengirim
        to: 'ika92315@gmail.com',  // Ganti dengan alamat email Anda
        subject: 'Pesan dari Formulir Kontak',
        text: `Nama: ${name}\nEmail: ${email}\nPesan: ${message}`
    };

    // Mengirim email menggunakan transporter
    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error('Error:', error);
            res.json({ success: false });
        } else {
            console.log('Email terkirim:', info.response);
            res.json({ success: true });
        }
    });
});
// Server berjalan di port 3000
app.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}`);
});
    });
</script>
<!-- Perhitungan SPK Section -->
<div id="perhitungan-spk" class="section bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Perhitungan AHP</h2>
        <p class="text-gray-700 text-center mb-8">Deskripsi dan perhitungan SPK akan ditampilkan di sini.</p>
            
            <!-- Form untuk memasukkan kriteria dan alternatif -->
            <form id="ahp-form" class="max-w-lg mx-auto">
                <div id="criteria-section" class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="criteria">Kriteria</label>
                    <div id="criteria-container">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2" type="text" name="criteria[]" placeholder="Masukkan kriteria">
                    </div>
                    <button type="button" onclick="addCriteria()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Kriteria</button>
                </div>
                
                <div id="alternatives-section" class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="alternatives">Alternatif</label>
                    <div id="alternatives-container">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2" type="text" name="alternatives[]" placeholder="Masukkan alternatif">
                    </div>
                    <button type="button" onclick="addAlternative()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Alternatif</button>
                </div>
                
                <div class="text-center">
                    <button type="button" onclick="calculateAHP()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Hitung</button>
                </div>
            </form>
            
            <div id="ahp-result" class="mt-8">
                <!-- Hasil perhitungan AHP akan ditampilkan di sini -->
            </div>
        </div>
    </div>

    <!-- JavaScript untuk perhitungan AHP -->
    <script>
        function addCriteria() {
            const container = document.getElementById('criteria-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'criteria[]';
            input.placeholder = 'Masukkan kriteria';
            input.className = 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2';
            container.appendChild(input);
        }

        function addAlternative() {
            const container = document.getElementById('alternatives-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'alternatives[]';
            input.placeholder = 'Masukkan alternatif';
            input.className = 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2';
            container.appendChild(input);
        }

        function calculateAHP() {
            const form = document.getElementById('ahp-form');
            const criteria = Array.from(form.elements['criteria[]']).map(input => input.value);
            const alternatives = Array.from(form.elements['alternatives[]']).map(input => input.value);

            if (criteria.length < 2 || alternatives.length < 2) {
                alert('Masukkan minimal 2 kriteria dan 2 alternatif.');
                return;
            }

            // Menampilkan matriks pairwise untuk kriteria
            const criteriaMatrix = createPairwiseMatrix(criteria);
            const criteriaWeights = calculateWeights(criteriaMatrix);

            // Menampilkan matriks pairwise untuk alternatif berdasarkan setiap kriteria
            const alternativeMatrices = criteria.map(() => createPairwiseMatrix(alternatives));
            const alternativeWeights = alternativeMatrices.map(matrix => calculateWeights(matrix));

            // Menghitung skor akhir untuk setiap alternatif
            const finalScores = calculateFinalScores(alternatives, criteriaWeights, alternativeWeights);

            displayResult(alternatives, finalScores);
        }

        function createPairwiseMatrix(items) {
            const matrix = [];
            for (let i = 0; i < items.length; i++) {
                const row = [];
                for (let j = 0; j < items.length; j++) {
                    if (i === j) {
                        row.push(1);
                    } else if (i < j) {
                        const value = prompt(`Masukkan nilai perbandingan untuk ${items[i]} dibandingkan ${items[j]}:`);
                        row.push(parseFloat(value));
                    } else {
                        row.push(1 / matrix[j][i]);
                    }
                }
                matrix.push(row);
            }
            return matrix;
        }

        function calculateWeights(matrix) {
            const sums = matrix[0].map((_, i) => matrix.reduce((sum, row) => sum + row[i], 0));
            const normalizedMatrix = matrix.map(row => row.map((value, i) => value / sums[i]));
            const averages = normalizedMatrix.map(row => row.reduce((a, b) => a + b, 0) / row.length);
            return averages;
        }

        function calculateFinalScores(alternatives, criteriaWeights, alternativeWeights) {
            const scores = alternatives.map((_, i) => 
                criteriaWeights.reduce((sum, weight, j) => sum + weight * alternativeWeights[j][i], 0)
            );
            return scores;
        }

        function displayResult(alternatives, scores) {
            // Menggabungkan alternatif dengan skor untuk pengurutan
            const results = alternatives.map((alternative, i) => ({
                alternative,
                score: scores[i]
            }));

            // Mengurutkan hasil berdasarkan skor (nilai tertinggi ke terendah)
            results.sort((a, b) => b.score - a.score);

            // Menampilkan hasil peringkat
            const resultContainer = document.getElementById('ahp-result');
            resultContainer.innerHTML = '<h3 class="text-2xl font-bold mb-4">Hasil Perhitungan AHP</h3>';
            const list = document.createElement('ol');
            results.forEach((result, i) => {
                const item = document.createElement('li');
                item.innerText = `${i + 1}. ${result.alternative} (Score: ${result.score.toFixed(2)})`;
                list.appendChild(item);
            });
            resultContainer.appendChild(list);
        }
    </script>

    <!-- Footer -->
    <div id="footer" class="bg-gray-800 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                &copy; 2024 Pemilihan Mitra AHP. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>