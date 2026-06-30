<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranKegiatanController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\pengurus\DashboardController;
use App\Http\Controllers\Pengurus\ProfilController;
use App\Http\Controllers\Pengurus\KegiatanController;
use App\Http\Controllers\Pengurus\LaporanController;
use App\Http\Controllers\Pengurus\ManajemenAnggotaController;
use App\Http\Controllers\Pembina\DashboardController as PembinaDashboard;
// use App\Http\Controllers\admin\DashboardController;



// 1. Alihkan halaman utama langsung ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// 2. Jalur Login (Akses Publik)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Jalur Keamanan Multi-Role
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        if ($role == 'admin') { return redirect('/admin/dashboard'); }
        if ($role == 'pengurus') { return redirect('/pengurus/dashboard'); }
        if ($role == 'anggota') { return redirect('/mahasiswa/dashboard'); }
        if ($role == 'pembina') { return redirect('/pembina/dashboard'); }
        
        return redirect('/login');
    });

    // [AKTOR 3] Jalur Khusus Mahasiswa
    Route::middleware(['cek_role:anggota'])->group(function () {
        Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
        
        // Rute Kegiatan
        Route::get('/mahasiswa/daftar-kegiatan', [PendaftaranKegiatanController::class, 'index'])->name('mahasiswa.kegiatan');
        Route::get('/mahasiswa/pendaftaran-kegiatan/{id}', [PendaftaranKegiatanController::class, 'showForm'])->name('kegiatan.daftar');
        Route::post('/mahasiswa/pendaftaran-kegiatan', [PendaftaranKegiatanController::class, 'store'])->name('kegiatan.simpan');
        Route::get('/mahasiswa/pendaftaran-kegiatan-berhasil', function () { return view('mahasiswa.pendaftaran_berhasil'); })->name('kegiatan.berhasil');
        // Route::get('/mahasiswa/pendaftaran-berhasil', function () { return view('mahasiswa.pendaftaran_berhasil');})->name('kegiatan.berhasil'); //baru
        
        // Rute Anggota
        // Rute Anggota
        Route::get('/mahasiswa/pendaftaran-anggota', [App\Http\Controllers\AnggotaController::class, 'index'])->name('mahasiswa.anggota');
        Route::post('/mahasiswa/pendaftaran-anggota', [App\Http\Controllers\AnggotaController::class, 'store'])->name('anggota.store');
        Route::get('/mahasiswa/pendaftaran-anggota-berhasil/{id_organisasi}', [App\Http\Controllers\AnggotaController::class, 'sukses'])->name('anggota.berhasil');
        
        //rute riwayat aktivitas
        // Route::get('/mahasiswa/riwayat-aktivitas', [MahasiswaController::class, 'riwayat'])->name('mahasiswa.riwayat');
        Route::get('/mahasiswa/riwayat-aktivitas', [App\Http\Controllers\MahasiswaController::class, 'riwayat'])->name('mahasiswa.riwayat');
    });

    // Jalur Admin
    Route::middleware(['cek_role:admin'])->group(function () {
        Route::get('/admin/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/pengguna', [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.pengguna');
        Route::put('/pengguna/{id}/update-role', [App\Http\Controllers\admin\UserController::class, 'updateRole'])->name('admin.pengguna.updateRole');
        Route::put('/pengguna/{id}/suspend', [App\Http\Controllers\admin\UserController::class, 'suspend'])->name('admin.pengguna.suspend');
        Route::get('/admin/profil', [App\Http\Controllers\admin\ProfilController::class, 'index'])->name('admin.profil');
        Route::patch('/admin/profil/{id}/update-status', [App\Http\Controllers\admin\ProfilController::class, 'updateStatus'])->name('admin.profil.update-status');
        Route::put('/admin/profil/update', [App\Http\Controllers\admin\ProfilController::class, 'update'])->name('admin.profil.update');
        Route::post('/admin/profil/store', [App\Http\Controllers\admin\ProfilController::class, 'store'])->name('admin.profil.store');
        Route::delete('/admin/profil/delete/{id}', [App\Http\Controllers\admin\ProfilController::class, 'destroy'])->name('admin.profil.delete');
});
    });         



    // Jalur Pengurus
    Route::middleware(['cek_role:pengurus'])->group(function () {
        Route::get('/pengurus/dashboard', [DashboardController::class, 'index'])->name('pengurus.dashboard');
        Route::get('/profil', [ProfilController::class, 'index'])->name('pengurus.profil');
        Route::post('/profil/update', [ProfilController::class, 'update'])->name('pengurus.profil.update');
        Route::get('/anggota', [AnggotaController::class, 'index'])->name('pengurus.anggota');
        Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('pengurus.kegiatan');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('pengurus.laporan');
        Route::post('/laporan/store', [LaporanController::class, 'store'])->name('pengurus.laporan.store');
        Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('pengurus.laporan.export.pdf');
        Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('pengurus.laporan.export.excel');
        Route::get('/anggota', [ManajemenAnggotaController::class, 'index'])->name('pengurus.anggota');
        Route::post('/anggota/{id}/update-status', [ManajemenAnggotaController::class, 'updateStatus'])->name('pengurus.anggota.update');
        Route::post('/anggota/{id}/update-status', [ManajemenAnggotaController::class, 'updateStatus'])->name('pengurus.anggota.update');


        // Route untuk edit kegiatan (Dibutuhkan untuk memperbaiki error Anda)
        Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('pengurus.kegiatan.edit');
        // Route untuk hapus kegiatan (Dibutuhkan untuk aksi hapus)
        Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('pengurus.kegiatan.destroy');
        
        Route::prefix('pengurus')->name('pengurus.')->group(function () {
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
});
    });



    
    // Jalur Pembina
    Route::middleware(['cek_role:pembina'])->prefix('pembina')->group(function () {
    Route::get('/dashboard', [PembinaDashboard::class, 'index'])->name('pembina.dashboard');
});


