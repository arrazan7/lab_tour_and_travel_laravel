<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class AlredyLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        if (!$accessToken) {
            // Token not found, continue to the next middleware or route
            return $next($request);
        }

        // User is logged in, redirect to dashboard page
        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            $profile = $responseProfile -> json()['data'];

            if ($profile['user_type'] == 'admin') {
                return redirect() -> route('dashboard');
            }
            elseif ($profile['user_type'] == 'public') {
                return redirect() -> route('home');
            }
        }
    }
}
