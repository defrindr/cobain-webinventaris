<?php

namespace App\Http\Middleware;

use Closure;

class Peminjam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::check() && (/*\Auth::user()->level->nama_level == 'Administrator' or \Auth::user()->level->nama_level == 'Operator' or */\Auth::user()->level->nama_level == 'Peminjam')) {
            return $next($request);
        } else {
            return abort(403, 'Izin ditolak.');
        }
    }
}
