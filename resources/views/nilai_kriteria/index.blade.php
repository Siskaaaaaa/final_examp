@extends('layouts.app')

@section('title', 'Nilai Kriteria')

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
    position: sticky; /* Menjadikan container tetap di atas saat digulir */
    top: 0; /* Jarak dari atas halaman */
    z-index: 100; /* Untuk menempatkan di atas elemen lain */
}

    .btn-container {
        margin-top: 1.5rem;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn-container button {
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

    .btn-container .consistency-button {
        background-color: #17a2b8;
        color: white;
        border: none;
    }

    .btn-container .consistency-button:hover {
        background-color: #138496;
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
    <h1 class="mb-4 page-title">Nilai Kriteria</h1>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <!-- Tampilkan nilai kriteria -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
            </thead>
            <tbody>
                @foreach($nilai_kriteria as $nilai)
                <tr>
                    <td>{{ $kriteria[$nilai->kode_kriteria] }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form untuk memasukkan perbandingan kriteria -->
    <div class="perbandingan-container">
        <table class="table table-bordered perbandingan-table">
            <thead class="thead-dark">
                <tr>
                    <th>Kriteria 1</th>
                    <th>Nilai Perbandingan</th>
                    <th>Kriteria 2</th>
                </tr>
            </thead>
            <tbody id="perbandingan-container">
                <tr>
                    <td>
                        <select name="perbandingan[0][kriteria1]" class="form-control" required>
                            @foreach($kriteria as $kode => $nama)
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
                        <select name="perbandingan[0][kriteria2]" class="form-control" required>
                            @foreach($kriteria as $kode => $nama)
                            <option value="{{ $kode }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="btn-container">
        <button id="add-perbandingan" type="button" class="btn add-button">+</button>
                <button id="check-consistency" type="button" class="btn consistency-button">Cek Konsistensi</button>
                <<form id="form-perbandingan" action="{{ route('nilai.kriteria.storePerbandingan') }}" method="POST">
    @csrf
    <!-- Isi form -->
    <button type="submit" class="btn submit-button">Simpan Perbandingan</button>
</form>

    </div>

    <!-- Tempatkan hasil konsistensi di atas form -->
    <div id="hasil-konsistensi" class="mt-5">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#add-perbandingan').click(function () {
            var index = $('#perbandingan-container tr').length; // Menghitung jumlah baris
            var newRow =
                `<tr>
                    <td>
                        <select name="perbandingan[${index}][kriteria1]" class="form-control" required>
                            @foreach($kriteria as $kode => $nama)
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
                        <select name="perbandingan[${index}][kriteria2]" class="form-control" required>
                            @foreach($kriteria as $kode => $nama)
                            <option value="{{ $kode }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>`;
            $('#perbandingan-container').append(newRow);
        });

        $('#check-consistency').click(function () {
            // Ambil data perbandingan dari form
            var perbandinganData = [];
            $('#perbandingan-container tr').each(function () {
                var kriteria1 = $(this).find('select[name^="perbandingan["][name$="[kriteria1]"]').val();
                var nilai = parseInt($(this).find('select[name^="perbandingan["][name$="[nilai]"]').val());
                var kriteria2 = $(this).find('select[name^="perbandingan["][name$="[kriteria2]"]').val();
                perbandinganData.push({ kriteria1: kriteria1, nilai: nilai, kriteria2: kriteria2 });
            });

            // Validasi data perbandingan
            if (perbandinganData.length < 1) {
                alert('Harap masukkan setidaknya satu perbandingan kriteria.');
                return;
            }

            // Hitung matriks perbandingan
            var matriksPerbandingan = {};
            for (var i = 0; i < perbandinganData.length; i++) {
                var kriteria1 = perbandinganData[i].kriteria1;
                var nilai = perbandinganData[i].nilai;
                var kriteria2 = perbandinganData[i].kriteria2;

                if (!matriksPerbandingan[kriteria1]) {
                    matriksPerbandingan[kriteria1] = {};
                }

                if (!matriksPerbandingan[kriteria2]) {
                    matriksPerbandingan[kriteria2] = {};
                }

                matriksPerbandingan[kriteria1][kriteria2] = nilai;
                matriksPerbandingan[kriteria2][kriteria1] = 1 / nilai;
            }

            // Hitung total baris
            var totalBaris = {};
            for (var kriteria1 in matriksPerbandingan) {
                totalBaris[kriteria1] = 0;
                for (var kriteria2 in matriksPerbandingan[kriteria1]) {
                    totalBaris[kriteria1] += matriksPerbandingan[kriteria1][kriteria2];
                }
            }

            // Hitung matriks normalisasi
            var matriksNormalisasi = {};
            for (var kriteria1 in matriksPerbandingan) {
                matriksNormalisasi[kriteria1] = {};
                for (var kriteria2 in matriksPerbandingan[kriteria1]) {
                    matriksNormalisasi[kriteria1][kriteria2] = matriksPerbandingan[kriteria1][kriteria2] / totalBaris[kriteria1];
                }
            }

            // Hitung vektor bobot (eigen vector)
            var vektorBobot = {};
            for (var kriteria1 in matriksNormalisasi) {
                vektorBobot[kriteria1] = 0;
                for (var kriteria2 in matriksNormalisasi[kriteria1]) {
                    vektorBobot[kriteria1] += matriksNormalisasi[kriteria1][kriteria2];
                }
                vektorBobot[kriteria1] /= Object.keys(matriksNormalisasi).length;
            }

            // Hitung konsistensi
            var CI = 0;
            for (var kriteria1 in matriksNormalisasi) {
                var sum = 0;
                for (var kriteria2 in matriksNormalisasi[kriteria1]) {
                    sum += matriksNormalisasi[kriteria1][kriteria2] * vektorBobot[kriteria2];
                }
                CI += sum / vektorBobot[kriteria1];
            }

            // Hitung Consistency Index (CI) dan Consistency Ratio (CR)
            var n = Object.keys(matriksNormalisasi).length;
            CI = (CI - n) / (n - 1);
            var RI = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49]; // Random Index (RI) untuk n = 10
            var CR = CI / RI[n];

            // Validasi hasil konsistensi
            if (isNaN(CI) || isNaN(CR)) {
                alert('Terjadi kesalahan dalam perhitungan. Harap periksa kembali data perbandingan kriteria.');
                return;
            }

            // Tampilkan hasil konsistensi
            var message = "<strong>Hasil Konsistensi:</strong><br>";
            if (CR < 0.1) {
                message += "<strong>Konsistensi:</strong> KONSISTEN<br>";
            } else {
                message += "<strong>Consistency Index (CI):</strong> " + CI.toFixed(4) + "<br>";
                message += "<strong>Consistency Ratio (CR):</strong> " + CR.toFixed(4) + "<br>";
            }

            // Tampilkan hasil di atas form
            $('#hasil-konsistensi').html('<div class="alert alert-info">' + message + '</div>');
        });
    });
</script>
@endsection