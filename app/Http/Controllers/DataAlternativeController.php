<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;

class DataAlternativeController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::all(); // Mengambil semua data dari model Alternative

        return view('alternative.index', compact('alternatives'));
    }

    public function create()
    {
        return view('alternative.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:alternatives|max:255',
            'nama' => 'required|max:255',
        ]);

        Alternative::create($validatedData);

        return redirect()->route('admin.data.alternative')->with('success', 'Alternative berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternative = Alternative::findOrFail($id);
        return view('alternative.edit', compact('alternative'));
    }

    public function update(Request $request, $id)
    {
        $alternative = Alternative::findOrFail($id);

        $validatedData = $request->validate([
            'kode' => 'required|max:255|unique:alternatives,kode,' . $id,
            'nama' => 'required|max:255',
        ]);

        $alternative->update($validatedData);

        return redirect()->route('admin.data.alternative')->with('success', 'Alternative berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alternative = Alternative::findOrFail($id);
        $alternative->delete();

        return redirect()->route('admin.data.alternative')->with('success', 'Alternative berhasil dihapus.');
    }
}
