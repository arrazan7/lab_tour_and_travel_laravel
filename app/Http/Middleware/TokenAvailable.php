<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenAvailable
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

        if ($accessToken) {
            // Token found, redirect to dashboard
            return redirect() -> route('dashboard');
        }

        // User is logged out, continue to the next middleware or route
        return $next($request);
    }
}
