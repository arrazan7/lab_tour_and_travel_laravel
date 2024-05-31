<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        if ($accessToken) {
            // Token found, continue to the next middleware or route
            return $next($request);
        }

        // User is logged out, redirect to login page
        return redirect() -> route('login_akun') -> with('error', 'You must login first.');
    }
}
