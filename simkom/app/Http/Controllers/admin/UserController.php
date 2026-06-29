<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan Model User sudah ada
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user, bisa difilter sesuai kebutuhan
        $users = User::all(); 
        return view('admin.pengguna', compact('users'));
    }

     public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);
        return back()->with('success', 'Peran pengguna berhasil diubah.');
    }

    public function suspend($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status_akun' => 'Suspend']);
        return back()->with('success', 'Akun berhasil disuspend.');
    }
}