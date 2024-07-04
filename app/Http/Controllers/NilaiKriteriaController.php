<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiKriteria;
use App\Models\KriteriaPerbandingan;

class NilaiKriteriaController extends Controller
{
    public function index()
    {
        $nilai_kriteria = NilaiKriteria::all(); // Ambil semua data nilai kriteria dari model

        $kriteria = [
            'F01' => 'Pengalaman Dan Keahlian',
            'F02' => 'Kualitas Produk',
            'F03' => 'Kemampuan Finansial',
            'F04' => 'Kapasitas Produksi',
            'F05' => 'Lokasi dan aksebilitas'
        ];

        return view('nilai_kriteria.index', compact('nilai_kriteria', 'kriteria'));
    }

    // Metode untuk menyimpan perbandingan kriteria
    public function storePerbandingan(Request $request)
    {
        // Validasi bahwa 'perbandingan' ada dan merupakan array
        if ($request->filled('perbandingan') && is_array($request->perbandingan)) {
            foreach ($request->perbandingan as $perbandingan) {
                // Pastikan $perbandingan adalah array sebelum mengakses indeksnya
                if (is_array($perbandingan)) {
                    KriteriaPerbandingan::updateOrCreate(
                        [
                            'kriteria1' => $perbandingan['kriteria1'],
                            'kriteria2' => $perbandingan['kriteria2'],
                        ],
                        [
                            'nilai' => $perbandingan['nilai'],
                        ]
                    );
                } else {
                    // Handle jika $perbandingan bukan array (misalnya null)
                    // Tindakan penanganan kesalahan sesuai kebutuhan
                    // Misalnya, lewati atau log kesalahan
                }
            }
            
            return redirect()->back()->with('success', 'Perbandingan berhasil disimpan!');
        } else {
            // Handle jika 'perbandingan' tidak ada atau bukan array
            // Misalnya, kembali dengan pesan kesalahan atau tindakan yang sesuai
            return redirect()->back()->with('error', 'Data perbandingan tidak valid.');
        }
    }

    // Metode lain seperti create, edit, store, update, delete, dll.
}