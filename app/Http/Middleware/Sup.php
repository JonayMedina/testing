<?php

namespace App\Http\Middleware;

use Closure;

class Sup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next, $role)
    {
        if (! Auth::user()->role == 'admin') {
            return redirect('home');
        }
        return $next($request);
    }

}
