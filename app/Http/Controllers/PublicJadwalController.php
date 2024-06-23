<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];
            $id_paketdestinasi = $id;

            $responseJadwal = Http::get('http://127.0.0.1:8000/api/read-jadwal/' .$id. '');
            $responsePaket = Http::get('http://127.0.0.1:8000/api/search-paket/' .$id. '');
            $responseUser = Http::get('http://127.0.0.1:8000/api/show-user/' .$responsePaket['data']['id_profile']. '');

            if (!$responseJadwal -> ok() || $responseJadwal === null) {

                return view('public.jadwal', compact('profile', 'id_paketdestinasi', 'responsePaket', 'responseUser'));
                exit;
            }
            else {
                $data = $responseJadwal['data'];
                $hari = [];
                $hari_ke = [];
                foreach ($data as $json) {
                    if (in_array($json['hari'], $hari)) {
                        continue;
                    }
                    $hari[] = $json['hari'];
                    $hari_ke[] = $json['hari_ke'];
                }

                return view('public.jadwal', compact('profile', 'data', 'id_paketdestinasi', 'responsePaket', 'responseUser', 'hari', 'hari_ke'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
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
