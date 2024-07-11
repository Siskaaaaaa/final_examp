<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganKriteria extends Model
{
    use HasFactory;

    protected $table = 'perbandingan_kriteria';

    protected $fillable = [
        'kriteria1_id',
        'nilai',
        'kriteria2_id',
    ];

    // Tambahan relasi jika dibutuhkan
}
