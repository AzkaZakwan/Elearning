<?php

use App\Http\Controllers\AccesController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\KelolaController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MateriController;
use App\Http\Middleware\KomenRole;
use App\Http\Middleware\UserRole;
use Illuminate\Support\Facades\Route;

// halaman awal
Route::get('/', [MainController::class, 'home'])->name('home');

// halaman deskripsi website
Route::get('/beranda', [MainController::class, 'beranda'])->name('beranda');

// authentication 
Route::get('/registrasi', [AccesController::class, 'viewRegister'])->name('viewRegister');
Route::post('/registrasi', [AccesController::class, 'register'])->name('register');
Route::post('/login', [AccesController::class, 'login'])->name('viewLogin');
Route::get('/login', function () {
    return view('Acces.login_elearning');
})->name('login');

// logout
Route::post('/logout', function () {
    session()->forget('user');
    return redirect('/');
})->name('logout');

// Middleware komentar
Route::middleware([KomenRole::class])->group(function(){
    // Tambah, Edit, Hapus komentar
    Route::post('/materi/{materi}/komen', [MateriController::class, 'komen'])->name('post.komen');
    Route::post('/komen/{id}', [MateriController::class, 'editKomen'])->name('edit.komen');
    Route::delete('/komen/{id}', [MateriController::class, 'hapusKomen'])->name('hapus.komen');
    // deskripsi materi
    Route::get('/deskripsi/{id}--{slug}', [DiskusiController::class, 'deskripsiMateri'])->name('deskripsi');
    
});
// Middleware user
Route::middleware([UserRole::class . ':user'])->group(function(){
    Route::get('/belajar', [MateriController::class, 'lihatMateri'])->name('lihatMateri');
    Route::get('/belajar/search', [MateriController::class, 'search'])->name('search');
    Route::get('/download-materi/{id}', [MateriController::class, 'download'])->name('download');
    Route::post('/komen/{id}/report', [MateriController::class, 'lapor'])->name('report.komen');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');    
    Route::post('/profile/update', [KelolaController::class, 'kelolaProfile'])->name('update.profile');    
});

// Middleware admin
Route::middleware([UserRole::class . ':admin'])->group(function(){
    Route::get('/uploadMateri', [MainController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    Route::post('/dashboardAdmin/tambah', [MateriController::class, 'tambahMateri'])->name('tambahMateri');        
    // Manage materi
    Route::get('/kelolaMateri', [KelolaController::class, 'kelola'])->name('kelolaMateri');
    Route::put('/kelolaMateri/update/{id}', [KelolaController::class, 'edit'])->name('editMateri');
    Route::delete('/kelolaMateri/hapus/{id}', [KelolaController::class, 'hapus'])->name('hapusMateri');
    Route::get('/kelolaMateri/search', [MateriController::class, 'kelolaSearch'])->name('kelolaSearch');
    // Kelola report
    Route::get('/kelolaReport', [KelolaController::class, 'kelolaReport'])->name('kelolaReport');
    Route::post('/hapusReport/{id}', [KelolaController::class, 'hapusReport'])->name('hapusReport');
    Route::post('/abaikanReport/{id}', [KelolaController::class, 'abaikanReport'])->name('abaikanReport');
});
