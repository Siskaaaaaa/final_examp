<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NilaiAlternative; // Sesuaikan dengan model yang digunakan untuk perbandingan kriteria


class Perbandingan extends Model
{
    use HasFactory;

    protected $table = 'perbandingan'; // Sesuaikan dengan nama tabel perbandingan jika berbeda

    protected $fillable = [
        'alternative1',
        'nilai',
        'alternative2',
    ];

    // Jika Anda ingin menonaktifkan timestamps (created_at dan updated_at)
    public $timestamps = false;
}
