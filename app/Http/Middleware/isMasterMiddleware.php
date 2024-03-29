<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class isMasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    ////USUARIO MESTRE
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && Auth::user()->email == 'admin@gmail.com' && Auth::user()->role == 1){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
