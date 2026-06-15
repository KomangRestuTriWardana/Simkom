<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan Model User sudah ada

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user, bisa difilter sesuai kebutuhan
        $users = User::all(); 
        return view('admin.pengguna', compact('users'));
    }
}