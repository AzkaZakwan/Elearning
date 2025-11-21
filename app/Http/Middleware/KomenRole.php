<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KomenRole
{
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('user')){
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu');
        }
        return $next($request);
    }
}

