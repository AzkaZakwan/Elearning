<?php
namespace App\Http\Controllers;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AccesController extends Controller
{
    public function viewRegister()
    {
        return view("Acces.register_elearning");
    }

    public function register(Request $req)
    {
        $req->validate([
            'nama'      => 'required|string|max:50',
            'email'     => 'required|email|unique:warga,email',
            'password'  =>  'required|string|min:8',
        ],
[
            'nama.required'     => 'Nama harus diisi',
            
            'email.required'    => 'Email harus diisi',
            'email.unique'      => 'Email sudah terdaftar',

            'password.required' =>  'Password harus diisi',
            'password.min'      =>  'Password minimal 8 karakter',
        ]);
        Warga::create([
            'nama'      => $req->nama,
            'email'     => $req->email,
            'password'  => Hash::make($req->password),
        ]);
        return redirect()->route('login')->with('success', 'Registrasi berhasil! silahkan login');
        
    }
    public function login(Request $req)
    {
        $req->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        
        $user = Warga::where('email', $req->email)->first();
        if (!$user || !Hash::check($req->password, $user->password)){
            return back()->withErrors([
                'login' => 'email atau password salah',
            ]);
        }
        session(['user' => $user->only(['id', 'nama', 'email', 'role']) ]);
        if ($user->role === 'admin'){
            return redirect()->route('kelolaMateri');
        }
        return redirect()->route('lihatMateri');
    } 
}
