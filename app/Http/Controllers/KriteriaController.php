<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all(); // Mengambil semua data dari model Kriteria
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:kriterias|max:255',
            'nama' => 'required|max:255',
        ]);

        Kriteria::create($validatedData);

        return redirect()->route('admin.data.kriteria')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $validatedData = $request->validate([
            'kode' => 'required|max:255|unique:kriterias,kode,' . $id,
            'nama' => 'required|max:255',
        ]);

        $kriteria->update($validatedData);

        return redirect()->route('admin.data.kriteria')->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('admin.data.kriteria')->with('success', 'Kriteria berhasil dihapus.');
    }
}