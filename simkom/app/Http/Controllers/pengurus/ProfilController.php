<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        // Mengembalikan view yang ada di resources/views/pengurus/profil.blade.php
        return view('pengurus.profil');
    }
}
