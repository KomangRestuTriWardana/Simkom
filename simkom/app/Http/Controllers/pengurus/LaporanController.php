<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengembalikan view yang ada di resources/views/pengurus/laporan.blade.php
        return view('pengurus.laporan');
    }
}
