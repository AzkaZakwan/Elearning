<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MateriController extends Controller
{


    public function tambahMateri(Request $req)
    {
        $rule = [
            'judul'     =>'required|unique:materi,judul',
            'materi'    =>'required|mimes:pdf|max:5120', 
            'deskripsi' =>'required|max:65535'    
        ];

        $message = [
            'judul.required'     =>'Judul harus diisi',
            'judul.unique'       =>'File sudah pernah diupload',

            'materi.required'    =>'File tidak terupload', 
            'deskripsi.required' =>'Deskripsi harus diisi',
            'deskripsi.max'      =>'Deskripsi melebihi batas karakter',
            
            'materi.mimes'       =>'File harus pdf',
            'materi.max'         =>'File maksimal 5 mb',
        ];

        $req->validate($rule,$message);
        
        // Path file pdf materi
        $path              = $req->file('materi')->store('materi', 'public');
        $baca              = new Materi();
        $baca->judul       = $req->judul ;
        $baca->materi      = $path ;
        $baca->deskripsi   = $req->deskripsi ;
        
        $baca->save();
        return redirect()->route('kelolaMateri')->with('success', 'berhasil tambah file materi');
    }

    public function lihatMateri()
    {
        $materi = Materi::all()->map(function ($item) {
            $item->slug = Str::slug($item->judul);
            return $item;
        });
        return view('Main.belajar_elearning_rt', compact('materi'));
    }

    public function download($id)
    {
        $materi = Materi::findOrFail($id);
        $filePath = public_path('storage/'. $materi->materi);        
        return response()->download($filePath, $materi->judul . '.pdf');
    }

    public function komen(Request $req, Materi $materi)
    {
        $validasi = [
            'komen' => 'required|string'
        ];

        $message = [
            'komen.string' => 'Komen harus berupa kalimat'
        ];
        $req->validate($validasi, $message);
        $komentar           = new Komentar();
        $komentar->warga_id  = session('user')['id'];
        $komentar->materi_id= $materi->id;
        $komentar->komen    = $req->komen;
        $komentar->save();

        return back()->with('success', 'komentar terkirim');
    }

    public function editKomen(Request $req, $id)
    {
        $validasi=[
            'komen' => 'required|string'
        ];
        
        $message = [
            'komen.string' => 'Komen harus berupa kalimat.'
        ];
        $req->validate($validasi, $message);

        // !=comment on other people
        $komentar = Komentar::findOrFail($id);
        if($komentar->warga_id != session('user')['id']){
            return back()->with('error', 'Tidak bisa edit komen orang lain');
        }

        $komentar->komen = $req->komen;
        $komentar->save();

        return back()->with('success', 'komentar diperbarui');
    }

    public function hapusKomen($id)
    {
        // Hanya bisa hapus komentar sendiri
        $komentar = Komentar::findOrFail($id);

        if($komentar->warga_id != session('user')['id']){
            return back()->with('error', 'Tidak bisa menghapus komen orang lain');
        }
        
        $komentar->delete();
        return back()->with('success', 'komentar berhasil dihapus');
    }

    public function lapor($id)
    {
        $komentar =Komentar::findOrFail($id);
        
        // !=report on other people
        if($komentar->warga_id == session('user')['id']){
            return back()->with('success', 'tidak bisa lapor komen sendiri');
        }

        // !=report admin
        if($komentar->warga->role == 'admin'){
            return back()->with('error', 'tidak bisa lapor komen admin');
        }

        // !=report twice
        if($komentar->lapor){
            return back()->with('error', 'Komentar sudah pernah dilaporkan');
        }
        $komentar->lapor = true;
        $komentar->save();
        return back()->with('success', 'Komentar berhasil dilaporkan');           
    }

}
