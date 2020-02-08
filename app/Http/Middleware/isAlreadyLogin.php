<?php

namespace App\Http\Middleware;

use Closure;

class isAlreadyLogin
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
        if (\Auth::check()) {
        	return redirect()->route('peminjaman.index');
        }else {
            return $next($request);
        }
    }
}
