<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
                return view('admin.paket', compact('profile', 'data'));
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
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            return view('admin.tambah-paket', compact('profile'));
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'id_profile' => 'required|numeric',
            'nama_paket' => 'required|max:30',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000'
        ]);

        // Ambil data input dari form
        $data = [
            'id_profile' => $request -> input('id_profile'),
            'nama_paket' => $request -> input('nama_paket')
        ];

        // Siapkan permintaan multipart
        $multipart = [];

        // Tambahkan data ke multipart
        foreach ($data as $key => $value) {
            $multipart[] = [
                'name' => $key,
                'contents' => $value
            ];
        }

        // Tambahkan file ke multipart jika ada
        if ($request -> hasFile('foto')) {
            $multipart[] = [
                'name' => 'foto',
                'contents' => fopen($request->file('foto')->getRealPath(), 'r'),
                'filename' => $request->file('foto')->getClientOriginalName()
            ];
        }

        // Kirim data ke Laravel API
        $response = Http::asMultipart() -> post('http://localhost:8000/api/store-paket', $multipart);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Paket Destinasi berhasil dibuat.');
            return redirect() -> route('admin_paket_index') -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Paket Destinasi gagal dibuat.');
            return redirect() -> route('admin_paket_index') -> with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $response = Http::get('http://127.0.0.1:8000/api/search-paket/' .$id. '');

            // Return view with flash message available
            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];
                if (!empty($data['foto'])) {
                    return view('admin.edit-paket', compact('profile', 'data'));
                }
                else {
                    $data['foto'] = "X";
                    return view('admin.edit-paket', compact('profile', 'data'));
                }
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $foto)
    {
        // Validate form
        $request->validate([
            'nama_paket' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000'
        ]);

        // Ambil data input dari form
        $data = [
            'id_paketdestinasi' => $request->input('id_paketdestinasi'),
            'nama_paket' => $request->input('nama_paket'),
            'old_foto' => $foto
        ];

        // Siapkan permintaan multipart
        $multipart = [];

        // Tambahkan data ke multipart
        foreach ($data as $key => $value) {
            $multipart[] = [
                'name' => $key,
                'contents' => $value
            ];
        }

        // Tambahkan file ke multipart jika ada
        if ($request -> hasFile('foto')) {
            $multipart[] = [
                'name' => 'foto',
                'contents' => fopen($request->file('foto')->getRealPath(), 'r'),
                'filename' => $request->file('foto')->getClientOriginalName()
            ];
        }

        // Kirim data ke Laravel API
        $response = Http::asMultipart() -> post('http://localhost:8000/api/update-paket', $multipart);

        // Proses respons dari API
        if ($response->ok()) {
            // Data berhasil dikirimkan
            session()->flash('alert', 'Paket Destinasi berhasil diperbarui.');
            return redirect()->route('admin_paket_index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session()->flash('alert', 'Paket Destinasi gagal diperbarui.');
            return redirect()->route('admin_paket_index')->with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $searchResponse = Http::get('http://127.0.0.1:8000/api/search-paket/' .$id. '');

        // Return view with flash message available
        if (!$searchResponse -> ok() || $searchResponse === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = [
                'id_paketdestinasi' => $searchResponse['data']['id_paketdestinasi'],
                'durasi_wisata' => $searchResponse['data']['durasi_wisata'],
                'old_foto' => $searchResponse['data']['foto']
            ];

            // Kirim data ke Laravel API
            $deleteResponse = Http::post('http://localhost:8000/api/delete-paket', $data);

            // Proses respons dari API
            if ($deleteResponse -> ok()) {
                // Data berhasil dikirimkan
                session() -> flash('alert', 'Paket Destinasi berhasil dihapus.');
                return redirect() -> route('admin_paket_index') -> with(['success' => 'Data Berhasil Dihapus!']);
            } else {
                // Terjadi kesalahan saat mengirim data
                session() -> flash('alert', 'Paket Destinasi gagal dihapus.');
                return redirect() -> route('admin_paket_index') -> with(['failed' => 'Data Gagal Dihapus!']);
            }
        }
    }
}
