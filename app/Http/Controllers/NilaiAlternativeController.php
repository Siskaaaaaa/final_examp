<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiAlternative;

class NilaiAlternativeController extends Controller
{
    public function nilaiAlternative()
    {
        $nilai_alternative = NilaiAlternative::all(); // Ambil semua data nilai alternative
        $alternatives = [
            'A001' => 'Alternative 1',
            'A002' => 'Alternative 2',
            'A003' => 'Alternative 3',
        ];

        return view('nilai_alternative.index', compact('nilai_alternative', 'alternatives'));
    }

    public function storePerbandingan(Request $request)
    {
        if ($request->has('perbandingan')) {
            foreach ($request->perbandingan as $perbandingan) {
                // Lakukan sesuatu dengan data perbandingan
                // Contoh: Simpan ke database menggunakan model, dsb.
            }
        }

        return redirect()->back()->with('success', 'Perbandingan berhasil disimpan!');
    }
}