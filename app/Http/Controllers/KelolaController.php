<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class KelolaController extends Controller
{
    public function kelola(Request $req)
    {
        $materi = Materi::all();

        $editMode = false;
        $materiEdit = null;
        
        if ($req->has('id')) {
            $editMode = true;
            $materiEdit = Materi::find($req->id);
        }
        return view('Main.kelola_materi_elearning_rt', compact('materi', 'editMode', 'materiEdit'));
    }
    public function edit(Request $req, $id)
    {
        $rule = [
            'judul'     => 'required|unique:materi,judul,' . $id,
            'deskripsi' => 'required|max:65535'    
        ];
        

        $message = [
            'judul.required'     =>'Judul harus diisi',
            'judul.unique'       =>'Judul sudah pernah digunakan',

            'deskripsi.required'   => 'Deskripsi harus diisi',
            'deskripsi.max'        => 'Deskripsi melebihi batas karakter',
        ];

        $req->validate($rule,$message);

        $materi = Materi::findOrFail($id);
        $materi->judul = $req->judul;
        $materi->deskripsi = $req->deskripsi;
        $materi->save();

        return redirect()->route('kelolaMateri')->with('success', 'Materi berhasil diperbarui');
    }

    public function hapus($id)
    {
        $materi = Materi::findOrFail($id);
            if ($materi->materi && Storage::disk('public')->exists($materi->materi)) {
            Storage::disk('public')->delete($materi->materi);
        }
        $materi->delete();

        return redirect()->route('kelolaMateri')->with('success', 'Berhasil hapus materi');
    }

    public function kelolaReport()
    {
        // Hanya admin
        if (session('user')['role'] !== 'admin') {
            return back()->with('error', 'Akses ditolak');
        }

        // Semua komentar yang dilaporkan
        $komentar = Komentar::with(['warga', 'materi'])
                    ->where('lapor', true)
                    ->get();

        return view('Main.kelola_report_rt', compact('komentar'));
    }

    public function hapusReport($id)
    {
        // Hanya admin
        if (session('user')['role'] !== 'admin') {
            return back()->with('error', 'Akses ditolak');
        }

        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return back()->with('success', 'Komentar berhasil dihapus oleh admin.');
    }
    public function abaikanReport($id)
    {
        // Hanya admin
        if (session('user')['role'] !== 'admin') {
            return back()->with('error', 'Akses ditolak');
        }

        $komentar = Komentar::findOrFail($id);
        $komentar->lapor = false;
        $komentar->save();

        return back()->with('success', 'Laporan berhasil diabaikan.');
    }
    public function kelolaProfile(Request $request)
    {
        $user = session('user');

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Update database
        DB::table('warga')
            ->where('id', $user['id'])
            ->update(['nama' => $request->nama]);

        // Update session
        $user['nama'] = $request->nama;
        session(['user' => $user]);

        return redirect()->route('profile')->with('success', 'Nama berhasil diperbarui');
    }
}
