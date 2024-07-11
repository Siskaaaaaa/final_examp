<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiAlternative;
use App\Models\Alternative;
use App\Models\Perbandingan;


class NilaiAlternativeController extends Controller
{
    public function nilaiAlternative()
    {
        $alternatives = Alternative::pluck('nama', 'kode');
        $nilai_alternatives = NilaiAlternative::all();

        return view('nilai_alternative.index', compact('nilai_alternatives', 'alternatives'));
    }

    public function storePerbandingan(Request $request)
    {
        $request->validate([
            'perbandingan.*.alternative1' => 'required',
            'perbandingan.*.nilai' => 'required|integer',
            'perbandingan.*.alternative2' => 'required',
        ]);

        try {
            if ($request->has('perbandingan')) {
                foreach ($request->perbandingan as $perbandingan) {
                    Perbandingan::create([
                        'alternative1' => $perbandingan['alternative1'],
                        'nilai' => $perbandingan['nilai'],
                        'alternative2' => $perbandingan['alternative2'],
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Perbandingan berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan perbandingan: ' . $e->getMessage());
        }
    }
}
