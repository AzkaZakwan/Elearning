<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{
    public function deskripsiMateri($id){
        $materi = Materi::findOrFail($id);
        return view('Main.materi_elearning_rt', compact('materi'));
    }
}
