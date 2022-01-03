<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$id_role)
    {
        if(in_array($request->user()->id_role,$id_role)){
            return $next($request);
        }
        return redirect('/dashboard');
    }
}
