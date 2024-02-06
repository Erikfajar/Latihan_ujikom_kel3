<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        
        dd([Auth::user()]);
        // if (auth()->user()->role == $role) {
        //     return $next($request);
        // }
        

    
            // Jika tidak memiliki peran yang diperbolehkan, berikan respons error
            return response()->json(['error' => 'Anda tidak diperbolehkan akses ke halaman ini'], 403);
    }
}
