<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAlternative extends Model
{
    use HasFactory; // Pastikan trait HasFactory diimpor dengan benar

    protected $fillable = ['alternative1', 'alternative2', 'nilai'];
}
