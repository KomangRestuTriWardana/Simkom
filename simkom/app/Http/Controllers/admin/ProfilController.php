<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        // Mengambil data admin yang sedang login
        $user = Auth::user();
        return view('admin.profil', compact('user'));
    }
}