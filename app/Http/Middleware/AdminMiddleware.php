<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Checks if the user is logged in and has the role of 'admin'.
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        // If the user is not an admin, redirect them to the user dashboard
        return redirect('/');
    }
}
