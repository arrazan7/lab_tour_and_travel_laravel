<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($response -> ok()) {
            $profile = $response -> json()['data'];

            if ($profile['user_type'] = 'admin') {
                return view('public.homePage', compact('profile'));
            }
            elseif ($profile['user_type'] = 'public') {
                return view('public.home', compact('profile'));
            }
        } else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
        return $next($request);
    }
}
