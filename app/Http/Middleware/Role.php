<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
    	$lanjut = false;
    	$roles = explode('-', $role);


    	foreach ($roles as $role) {
			if (\Auth::check() && \Auth::user()->level->nama_level == $role) {
            	$lanjut = true;
        	}
    	}


    	if($lanjut){
            \App\Helpers\MyHelper::logging($request);
            return $next($request);
    	}else {
            return abort(403, 'Izin ditolak.');
        }
    }

}
