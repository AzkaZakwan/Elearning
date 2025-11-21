<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Home elearning
    public function home(){
        return view('Main.home_elearning_rt');
    }
    
    // Desc web elearning
    public function beranda(){
        return view('Main.beranda_elearning_rt');
    }
    
    // Admin and warga
    // Admin
    public function dashboardAdmin(){
        return view('Main.tambah_materi_elearning');
    }

    public function profile()
    {
        // Ambil data user dari session (sesuai sistem kamu)
        $user = session('user');

        return view('Main.profile_elearning_rt', compact('user'));
    }
}
