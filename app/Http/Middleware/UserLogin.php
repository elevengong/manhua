<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class UserLogin
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
        if(!$request->session()->has('user'))
        {
            return redirect('/login');
        }
        return $next($request);

    }
}
