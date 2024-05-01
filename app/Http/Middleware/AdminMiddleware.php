<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
         * 0 superAdmin
         * 1 Admin
         * 2 Company
         * */
        if (Auth::check())
        {
//            dd(Auth::guard('admin')->user()->role == 1);
            if (Auth::guard('admin')->user()->role == '1')
            {
                return $next($request);
            }

       }
        return $next($request);
    }
}
