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
    }

    .perbandingan-table th,
    .perbandingan-table td {
        padding: 0.75rem;
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
                <tr>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                </tr>
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
        <form id="form-perbandingan" action="{{ route('nilai.kriteria.storePerbandingan') }}" method="POST">
            @csrf
            <button type="submit" class="btn submit-button">Simpan Perbandingan</button>
        </form>
        <button id="check-consistency" type="button" class="btn consistency-button">Cek Konsistensi</button>
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

        $('#check-consistency').click(function() {
            alert('Fungsi untuk mengecek konsistensi belum diimplementasikan.');
            // Implementasi logika untuk cek konsistensi bisa ditambahkan di sini
        });
    });
</script>
@endsection