<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('user')['role'] == 'Guru') {
            return $next($request);
        }
        return redirect('login')->with('failed', 'Akses ditolak ! Anda bukan Guru.');
    }
}
