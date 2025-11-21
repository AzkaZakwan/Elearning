<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(!session()->has('user')){
            // Belum login → ke login
            return redirect()->route('login')->withErrors([ 'Harap login terlebih dahulu']);
        }

        $user = session('user');
        
        if($user['role'] !== $role){
            if($user['role'] === 'admin') {
                return redirect()->route('kelolaMateri')->withErrors(['role'=>'Akses ditolak']);
            } else {
                return redirect()->route('lihatMateri')->withErrors(['role'=>'Akses ditolak ']);
            }
        }

        return $next($request);
    }

}
