@extends('layouts.app')

@section('title', 'Nilai Alternative')

@section('contents')
<style>
    .mt-5 {
        margin-top: 1.5rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .perbandingan-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1.5rem;
        font-size: 14px; /* Ukuran font lebih kecil */
    }

    .perbandingan-table th,
    .perbandingan-table td {
        padding: 0.5rem; /* Padding lebih sedikit */
        text-align: center;
        vertical-align: middle;
        border: 1px solid #ddd;
    }


    .perbandingan-container {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 0.5rem;
        margin-top: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-container {
        margin-top: 1.5rem;
        text-align: right;
    }

    .btn-container button {
        margin-left: 1rem;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-container .add-button {
        background-color: #28a745;
        color: white;
        border: none;
    }

    .btn-container .add-button:hover {
        background-color: #218838;
    }

    .btn-container .submit-button {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-container .submit-button:hover {
        background-color: #0056b3;
    }

    .btn-container .check-button {
        background-color: #ffc107;
        color: white;
        border: none;
    }

    .btn-container .check-button:hover {
        background-color: #e0a800;
    }

    .alert {
        margin-top: 1.5rem;
        border-radius: 8px;
    }

    .page-title {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .add-button {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        line-height: 36px;
        text-align: center;
        font-size: 1.5rem;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .add-button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container mt-5">
    <h1 class="mb-4 page-title">Nilai Alternative</h1>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <!-- Tampilkan nilai alternative -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
            </thead>
            <tbody>
                @foreach($nilai_alternatives as $nilai)
                <tr>
                    <td>{{ $alternatives[$nilai->kode_alternative] }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form untuk memasukkan perbandingan alternative -->
    <div class="perbandingan-container">
        <form action="{{ route('nilai.alternative.storePerbandingan') }}" method="POST" id="perbandingan-form">
            @csrf
            <table class="table table-bordered perbandingan-table">
                <thead class="thead-dark">
                    <tr>
                        <th>Alternative 1</th>
                        <th>Nilai Perbandingan</th>
                        <th>Alternative 2</th>
                    </tr>
                </thead>
                <tbody id="perbandingan-container">
                    <tr>
                        <td>
                            <select name="perbandingan[0][alternative1]" class="form-control" required>
                                @foreach($alternatives as $kode => $nama)
                                <option value="{{ $kode }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="perbandingan[0][nilai]" class="form-control" required>
                                <option value="9">9 Mutlak Lebih Penting</option>
                                <option value="7">7 Sangat Lebih Penting</option>
                                <option value="5">5 Lebih Penting</option>
                                <option value="3">3 Cukup Penting</option>
                                <option value="1">1 Sama Penting</option>
                            </select>
                        </td>
                        <td>
                            <select name="perbandingan[0][alternative2]" class="form-control" required>
                                @foreach($alternatives as $kode => $nama)
                                <option value="{{ $kode }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="btn-container">
                <button id="add-perbandingan" type="button" class="btn add-button">+</button>
                <button type="submit" class="btn submit-button">Simpan Perbandingan</button>
                <button id="check-consistency" type="button" class="btn check-button">Cek Konsistensi</button>
            </div>
        </form>
    </div>

    <!-- Hasil Nilai Alternative -->
    <div id="hasil-nilai-alternative" class="mt-5">
        <!-- Hasil konsistensi akan ditampilkan di sini -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
     $(document).ready(function () {
        $('#add-perbandingan').click(function () {
            var index = $('#perbandingan-container tr').length;
            var newRow =
                `<tr>
                    <td>
                        <select name="perbandingan[${index}][alternative1]" class="form-control" required>
                            @foreach($alternatives as $kode => $nama)
                            <option value="{{ $kode }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="perbandingan[${index}][nilai]" class="form-control" required>
                            <option value="9">9 Mutlak Lebih Penting</option>
                            <option value="7">7 Sangat Lebih Penting</option>
                            <option value="5">5 Lebih Penting</option>
                            <option value="3">3 Cukup Penting</option>
                            <option value="1">1 Sama Penting</option>
                        </select>
                    </td>
                    <td>
                        <select name="perbandingan[${index}][alternative2]" class="form-control" required>
                            @foreach($alternatives as $kode => $nama)
                            <option value="{{ $kode }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>`;
            $('#perbandingan-container').append(newRow);
        });

        $('#check-consistency').click(function () {
            var perbandinganData = [];
            $('#perbandingan-container tr').each(function () {
                var alternative1 = $(this).find('select[name^="perbandingan["][name$="[alternative1]"]').val();
                var nilai = parseInt($(this).find('select[name^="perbandingan["][name$="[nilai]"]').val());
                var alternative2 = $(this).find('select[name^="perbandingan["][name$="[alternative2]"]').val();
                
                // Validasi agar tidak ada pembandingan dengan alternatif yang sama
                if (alternative1 === alternative2) {
                    alert('Perbandingan antara alternatif yang sama tidak diperbolehkan.');
                    perbandinganData = [];
                    return false; // Menghentikan iterasi jika ditemukan kesalahan
                }
                
                perbandinganData.push({ alternative1: alternative1, nilai: nilai, alternative2: alternative2 });
            });

            // Validasi data perbandingan
            if (perbandinganData.length < 1) {
                alert('Harap masukkan setidaknya satu perbandingan alternative.');
                return;
            }

            // Hitung nilai alternative berdasarkan perbandingan
            var nilaiAlternatif = {};
            perbandinganData.forEach(function (item) {
                var alternative1 = item.alternative1;
                var nilai = item.nilai;
                var alternative2 = item.alternative2;

                // Pastikan alternative1 dan alternative2 sudah ada dalam nilaiAlternatif
                if (!nilaiAlternatif[alternative1]) {
                    nilaiAlternatif[alternative1] = {};
                }
                if (!nilaiAlternatif[alternative1][alternative2]) {
                    nilaiAlternatif[alternative1][alternative2] = 0;
                }
                nilaiAlternatif[alternative1][alternative2] += nilai;

                // Jika alternative2 belum ada, inisialisasikan dengan 0
                if (!nilaiAlternatif[alternative2]) {
                    nilaiAlternatif[alternative2] = {};
                }
                if (!nilaiAlternatif[alternative2][alternative1]) {
                    nilaiAlternatif[alternative2][alternative1] = 0;
                }
                nilaiAlternatif[alternative2][alternative1] += 1 / nilai;
            });

            // Hitung jumlah total perbandingan untuk setiap alternative
            var totalPerbandingan = {};
            Object.keys(nilaiAlternatif).forEach(function (alternative1) {
                totalPerbandingan[alternative1] = 0;
                Object.keys(nilaiAlternatif[alternative1]).forEach(function (alternative2) {
                    totalPerbandingan[alternative1] += nilaiAlternatif[alternative1][alternative2];
                });
            });

            // Hitung nilai alternative akhir
            var nilaiAkhirAlternative = {};
            Object.keys(nilaiAlternatif).forEach(function (alternative1) {
                nilaiAkhirAlternative[alternative1] = 0;
                Object.keys(nilaiAlternatif[alternative1]).forEach(function (alternative2) {
                    nilaiAkhirAlternative[alternative1] += nilaiAlternatif[alternative1][alternative2] / totalPerbandingan[alternative1];
                });
            });

            // Tampilkan hasil konsistensi
            var konsistensi = true;
            Object.keys(nilaiAkhirAlternative).forEach(function (alternative) {
                if (nilaiAkhirAlternative[alternative] < 0.1 || nilaiAkhirAlternative[alternative] > 10) {
                    konsistensi = false;
                }
            });

            var hasilKonsistensi = konsistensi ? 'Konsisten' : 'Tidak Konsisten';
            $('#hasil-nilai-alternative').html('<div class="alert alert-info mt-4">Hasil Konsistensi: ' + hasilKonsistensi + '</div>');
        });
    });
</script>
@endsection