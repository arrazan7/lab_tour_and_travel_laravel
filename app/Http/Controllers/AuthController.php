<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // This method will show login page for user
    public function login()
    {
        return view('authenticate.login');
    }

    // This method will authenticate user
    public function authenticate(Request $request)
    {
        // Ambil data register input dari form
        $data = $request -> all();

        // Kirim data register ke Laravel API
        $response = Http::post('http://localhost:8000/api/authenticate', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            $jsonData = $response -> json();
            $accessToken = $jsonData['token'];
            session() -> put('access_token', $accessToken);

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
        else {
            // Check for JSON response with validation errors
            $jsonData = $response -> json();
            if (isset($jsonData['errors'])) {
                // Pass errors to the Blade view for display
                return redirect() -> back() -> withErrors($jsonData['errors']);
            } else {
                // Handle other types of errors (e.g., server error)
                return redirect() -> back() -> with('error', $jsonData['message']);
            }
        }
    }

    public function logout()
    {
        $accessToken = session() -> get('access_token');

        // Send logout request with Bearer token in Authorization header
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/logout');

        // Process API response
        if ($response -> ok()) {
            // Successful logout
            session() -> forget('access_token'); // Clear token from session
            return redirect() -> route('login_akun'); // Redirect to login page
        } else {
            // Failed logout
            // Handle potential errors (e.g., invalid token, server error)
            // You can display error messages to the user or log the error details
            return redirect() -> back() -> with('error', 'Logout failed. Please try again.');
        }
    }

    // This method will show register page
    public function register()
    {
        return view('authenticate.register');
    }

    public function storeRegister(Request $request)
    {
        // Ambil data register input dari form
        $data = $request -> all();

        // Kirim data register ke Laravel API
        $response = Http::post('http://localhost:8000/api/register', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            return redirect() -> route('login_akun') -> with('success', 'You have registered successfully!');
        }
        else {
            // Check for JSON response with validation errors
            $jsonData = $response -> json();
            if (isset($jsonData['errors'])) {
                // Pass errors to the Blade view for display
                return redirect() -> back() -> withErrors($jsonData['errors']);
            } else {
                // Handle other types of errors (e.g., server error)
                return redirect() -> back() -> with('error', 'An error occurred during registration.');
            }
        }
    }

    public function dashboard()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($response -> ok()) {
            $profile = $response -> json()['data'];
            return view('public.homePage', compact('profile'));
        } else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function home()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $responsePaket = Http::get('http://127.0.0.1:8000/api/read-paket');
            $dataPaketDestinasi = json_decode($responsePaket -> getBody(), true);

            if (!$responsePaket -> ok() || $dataPaketDestinasi === null) {
                // Gagal mendapat data paket
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                // Berhasil mendapat data paket
                $data = $dataPaketDestinasi['data'];
                return view('public.home', compact('profile', 'data'));
            }
        } else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
