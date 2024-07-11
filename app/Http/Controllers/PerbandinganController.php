<?php
// app/Http/Controllers/PerbandinganController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerbandinganController extends Controller
{
    public function perbandingan()
    {
        // Contoh data perbandingan kriteria
        $perbandinganKriteria = [
            (object)['kriteria1' => 'K1', 'kriteria2' => 'K2', 'nilai' => 3],
            (object)['kriteria1' => 'K1', 'kriteria2' => 'K3', 'nilai' => 5],
            // Tambahkan data lainnya...
        ];

        // Contoh data perbandingan alternatif
        $perbandinganAlternatif = [
            (object)['alternatif1' => 'A1', 'alternatif2' => 'A2', 'nilai' => 4],
            (object)['alternatif1' => 'A1', 'alternatif2' => 'A3', 'nilai' => 2],
            // Tambahkan data lainnya...
        ];

        // dd($perbandinganKriteria, $perbandinganAlternatif); // Periksa apakah data terkirim dengan benar

        return view('perbandingan.index', compact('perbandinganKriteria', 'perbandinganAlternatif'));
    }
}
