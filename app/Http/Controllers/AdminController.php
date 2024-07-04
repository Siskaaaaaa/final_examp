<?php

namespace App\Http\Controllers;

use App\Models\Alternatif; // Sesuaikan dengan model yang digunakan
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profilepage()
    {
        return view('profile');
    }
}