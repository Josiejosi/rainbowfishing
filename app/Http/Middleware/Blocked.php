<?php

namespace App\Http\Middleware;

use Closure;

class Blocked
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
        if (auth()->check() ) {

            \Log::info( auth()->user()->is_blocked ) ;

            if ( auth()->user()->is_blocked == 1 ) {
                
                return redirect( '/blocked' ) ;
            }

        }


        

        return $next($request);
    }
}
