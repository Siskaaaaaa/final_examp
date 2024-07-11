<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PerbandinganKriteria;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;

class NilaiKriteriaController extends Controller
{
    public function index()
    {
        $nilai_kriteria = NilaiKriteria::all();
        $kriteria = Kriteria::pluck('nama', 'kode')->all();
        
        return view('nilai_kriteria.index', compact('nilai_kriteria', 'kriteria'));
    }

    public function storePerbandingan(Request $request)
    {
        // Validasi input
        $request->validate([
            'perbandingan' => 'required|array|min:1',
            'perbandingan.*.kriteria1' => 'required|exists:kriteria,kode',
            'perbandingan.*.nilai' => 'required|in:9,7,5,3,1',
            'perbandingan.*.kriteria2' => 'required|exists:kriteria,kode',
        ]);

        try {
            // Memulai transaksi database
            DB::beginTransaction();

            // Loop untuk menyimpan data perbandingan
            foreach ($request->perbandingan as $data) {
                PerbandinganKriteria::create([
                    'kriteria1_id' => $data['kriteria1'],
                    'nilai' => $data['nilai'],
                    'kriteria2_id' => $data['kriteria2'],
                ]);
            }

            // Commit transaksi jika semua operasi berhasil
            DB::commit();

            return redirect()->route('hasil.index')->with('success', 'Data perbandingan kriteria berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollback();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
