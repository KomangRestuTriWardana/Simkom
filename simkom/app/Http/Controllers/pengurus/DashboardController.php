<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengembalikan view yang ada di resources/views/pengurus/dashboard.blade.php
        return view('pengurus.dashboard');
    }
}
