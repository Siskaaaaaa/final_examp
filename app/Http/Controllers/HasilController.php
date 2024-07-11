<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function showHasil()
    {
        $kriteriaComparisons = [
            ['nama' => 'Pengalaman Dan Keahlian', 'values' => [1, 3, 5, 7, 9]],
            ['nama' => 'Kualitas Produk', 'values' => [0.333333333, 1, 3, 5, 7]],
            ['nama' => 'Kemampuan Finansial', 'values' => [0.2, 0.333333333, 1, 3, 5]],
            ['nama' => 'Kapasitas Produksi', 'values' => [0.142857143, 0.2, 0.333333333, 1, 3]],
            ['nama' => 'Lokasi dan Aksesibilitas', 'values' => [0.111111111, 0.142857143, 0.2, 0.333333333, 1]],
        ];

        // Menghitung jumlah kolom
        $columnSums = [];
        foreach ($kriteriaComparisons as $comparison) {
            foreach ($comparison['values'] as $colIndex => $value) {
                if (!isset($columnSums[$colIndex])) {
                    $columnSums[$colIndex] = 0;
                }
                $columnSums[$colIndex] += $value;
            }
        }

        // Menghitung matriks normalisasi
        $kriteriaNormalizations = [];
        foreach ($kriteriaComparisons as $comparison) {
            $normalizedValues = [];
            foreach ($comparison['values'] as $colIndex => $value) {
                $normalizedValues[] = $value / $columnSums[$colIndex];
            }
            $kriteriaNormalizations[] = [
                'nama' => $comparison['nama'],
                'values' => $normalizedValues
            ];
        }

        // Menghitung eigenvector (prioritas) untuk kriteria
        $eigenvectorsKriteria = [];
        foreach ($kriteriaNormalizations as $normalization) {
            $eigenvectorsKriteria[] = array_sum($normalization['values']) / count($normalization['values']);
        }

       // Menghitung matriks perbandingan alternatif
       $alternatifComparisons = [
            ['nama' => 'PT. Tiga Lumbung Padi', 'values' => [3, 4, 4, 4, 3]],
            ['nama' => 'PT. Bintang Indokarya Gemilang', 'values' => [3, 5, 4, 3, 4]],
            ['nama' => 'PT. DAEHAN GLOBAL CIMOHONG', 'values' => [5, 3, 3, 5, 1]],
            ['nama' => 'PT. CHAERON POKPHAND JAYA BANGSRI', 'values' => [4, 3, 3, 1, 5]],
        ];

        // Menghitung matriks normalisasi untuk alternatif
        $alternatifNormalizations = [];
        foreach ($alternatifComparisons as $comparison) {
            $normalizedValues = [];
            foreach ($comparison['values'] as $colIndex => $value) {
                $normalizedValues[] = $value / $columnSums[$colIndex];
            }
            $alternatifNormalizations[] = [
                'nama' => $comparison['nama'],
                'values' => $normalizedValues
            ];
        }

        // Menghitung eigenvector (prioritas) untuk alternatif
        $eigenvectorsAlternatif = [];
        foreach ($alternatifNormalizations as $normalization) {
            $eigenvectorsAlternatif[] = array_sum($normalization['values']) / count($normalization['values']);
        }

        // Hitung ranking untuk kriteria
        arsort($eigenvectorsKriteria); // Mengurutkan nilai eigenvector (prioritas) kriteria dari yang tertinggi ke terendah
        $rankingKriteria = array_keys($eigenvectorsKriteria);

        // Hitung ranking untuk alternatif
        arsort($eigenvectorsAlternatif); // Mengurutkan nilai eigenvector (prioritas) alternatif dari yang tertinggi ke terendah
        $rankingAlternatif = array_keys($eigenvectorsAlternatif);

        // Nama kriteria untuk header tabel
        $kriteriaNames = ['Pengalaman Dan Keahlian', 'Kualitas Produk', 'Kemampuan Finansial', 'Kapasitas Produksi', 'Lokasi dan Aksesibilitas'];

        // Nama alternatif untuk header tabel
        $alternatifNames = ['PT. Tiga Lumbung Padi', 'PT. Bintang Indokarya Gemilang', 'PT. DAEHAN GLOBAL CIMOHONG', 'PT. CHAERON POKPHAND JAYA BANGSRI'];
        
        return view('hasil.index', compact(
            'kriteriaNames',
            'kriteriaComparisons',
            'kriteriaNormalizations',
            'eigenvectorsKriteria',
            'alternatifNames',
            'alternatifComparisons',
            'alternatifNormalizations',
            'eigenvectorsAlternatif',
            'rankingKriteria',
            'rankingAlternatif'
        ));
    }
}
