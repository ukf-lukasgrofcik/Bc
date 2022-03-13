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
    public function handle(Request $request, Closure $next, $role, $addition_role = null)
    {
        // Abort if not allowed
        if(!auth()->user()->clearance($role))
            if(isset($addition_role) && !auth()->user()->clearance($addition_role)) abort(404);


        return $next($request);
    }

}
