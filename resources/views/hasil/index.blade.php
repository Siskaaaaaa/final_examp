@extends('layouts.app')

@section('title', 'Hasil AHP')

@section('contents')
<style>
    /* Gaya CSS sesuai kebutuhan tampilan */
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    .container {
        margin-top: 50px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th, .table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .wide-table {
        overflow-x: auto;
    }

    h2 {
        margin-top: 30px;
    }
</style>

<div class="container">
    <h2>Hasil Analisis Hierarchy Process (AHP)</h2>

    <!-- Tabel untuk menampilkan nilai perbandingan kriteria -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                @foreach($kriteriaNames as $nama)
                    <th>{{ $nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($kriteriaComparisons as $index => $comparison)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $comparison['nama'] }}</td>
                    @foreach($comparison['values'] as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabel untuk menampilkan normalisasi perbandingan kriteria -->
    <h2>Normalisasi Perbandingan Kriteria</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                @foreach($kriteriaNames as $nama)
                    <th>{{ $nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($kriteriaNormalizations as $index => $normalization)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $normalization['nama'] }}</td>
                    @foreach($normalization['values'] as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabel untuk menampilkan eigenvector (prioritas) kriteria dan alternatif -->
    <h2>Eigenvector (Prioritas) Kriteria dan Alternatif</h2>
    <div class="wide-table">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kriteria / Alternatif</th>
                    @foreach($kriteriaNames as $nama)
                        <th>{{ $nama }}</th>
                    @endforeach
                    <th>Eigenvector (Prioritas)</th>
                    <th>Ranking</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriteriaNames as $index => $nama)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $nama }}</td>
                        @foreach($kriteriaNormalizations[$index]['values'] as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                        <td>{{ isset($eigenvectorsKriteria[$index]) ? $eigenvectorsKriteria[$index] : '-' }}</td>
                        <td>{{ isset($rankingKriteria[$index]) ? $rankingKriteria[$index] + 1 : '-' }}</td>
                    </tr>
                @endforeach

                @foreach($alternatifNames as $index => $nama)
                    <tr>
                        <td>{{ $index + 1 + count($kriteriaNames) }}</td>
                        <td>{{ $nama }}</td>
                        @foreach($alternatifNormalizations[$index]['values'] as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                        <td>{{ isset($eigenvectorsAlternatif[$index]) ? $eigenvectorsAlternatif[$index] : '-' }}</td>
                        <td>{{ isset($rankingAlternatif[$index]) ? $rankingAlternatif[$index] + 1 : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
