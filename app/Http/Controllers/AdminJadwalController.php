<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class AdminJadwalController extends Controller
{
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




    public function penginapan()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            return view('admin.penginapan', compact('profile'));
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function tambahPenginapan()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            return view('admin.tambah-penginapan', compact('profile'));
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function transportasi()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            return view('admin.transportasi', compact('profile'));
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function tambahTransportasi()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            return view('admin.tambah-transportasi', compact('profile'));
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function custom()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            return view('admin.custom', compact('profile'));
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }
    public function booking()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            return view('admin.booking', compact('profile'));
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }
}
