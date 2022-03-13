<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Clearance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(!auth()->user()->clearance($role)) abort(404); // Abort if not allowed

        return $next($request);
    }

}
