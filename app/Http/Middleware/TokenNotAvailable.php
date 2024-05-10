<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenNotAvailable
{
    /**
     * Handle an incoming HTTP request and return the response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, $next)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        if (!$accessToken) {
            // No token found, redirect to login page
            return redirect() -> route('login_akun') -> with('error', 'You must login first.');
        }

        // User is logged in, continue to the next middleware or route
        return $next($request);
    }
}
