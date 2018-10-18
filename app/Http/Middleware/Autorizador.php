<?php

namespace estoque\Http\Middleware;

use Closure;
use Auth;
class Autorizador
{
    public function handle($request, Closure $next)
    {
        if(!$request->is('login') && Auth::guest()){
            return redirect('/login');
        }
        return $next($request);
    }
}
