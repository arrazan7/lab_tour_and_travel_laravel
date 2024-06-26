<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminJadwalController extends Controller
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

                return view('admin.jadwal', compact('profile', 'id_paketdestinasi', 'responsePaket', 'responseUser'));
                exit;
            }
            else {
                $data = $responseJadwal['data'];
                return view('admin.jadwal', compact('profile', 'data', 'id_paketdestinasi', 'responsePaket', 'responseUser'));
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
    public function create(int $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $id_paketdestinasi = $id;

            $responseDestinasi = Http::get('http://127.0.0.1:8000/api/list-destinasi');

            // Set flash message for alert
            session() -> flash('alert', 'Jadwal destinasi baru akan dibuat.');

            // Return view with flash message available
            return view('admin.tambah-jadwal', compact('profile', 'id_paketdestinasi', 'responseDestinasi'));
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
        // //dd($request -> all());
        // //validate form
        // $request->validate([
        //     'id_paket' => 'required|numeric',
        //     'hari' => 'required',
        //     'jarak_tempuh' => 'required|numeric',
        //     'waktu_tempuh' => 'required|numeric',
        //     'id_destinasi' => 'required|string',
        //     'jam_mulai' => 'required|string',
        //     'jam_selesai' => 'required|string',
        //     'jam_lokasi' => 'required|string'
        // ]);

        // Ambil data input dari form
        $data = $request -> all();



        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/store-jadwal', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Jadwal destinasi berhasil dibuat.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Jadwal destinasi gagal dibuat. id paket = ' .$data['id_paketdestinasi']. '');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Disimpan!']);
        }
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

    public function editIdDestinasi(string $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $responseJadwal = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');
            $responseDestinasi = Http::get('http://127.0.0.1:8000/api/list-destinasi');

            // Return view with flash message available
            if (!$responseJadwal -> ok() || $responseJadwal === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $responseJadwal['data'];
                return view('admin.edit-idDestinasi', compact('profile', 'data', 'responseDestinasi'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function updateIdDestinasi(Request $request)
    {
        // Ambil data input dari form
        $data = $request -> all();

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-id-destinasi', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Tujuan Destinasi berhasil diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Tujuan Destinasi gagal diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
    }

    public function editJamMulai(string $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $response = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

            // Return view with flash message available
            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];
                return view('admin.edit-jamMulai', compact('profile', 'data'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function updateJamMulai(Request $request)
    {
        // Ambil data input dari form
        $data = $request -> all();

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-jam-mulai', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Jam Mulai berhasil diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Jam Mulai gagal diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
    }

    public function editJamSelesai(string $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $response = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

            // Return view with flash message available
            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];
                return view('admin.edit-jamSelesai', compact('profile', 'data'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function updateJamSelesai(Request $request)
    {
        // Ambil data input dari form
        $data = $request -> all();

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-jam-selesai', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Jam Selesai berhasil diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Jam Selesai gagal diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
    }

    public function editWaktuTempuh(string $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $response = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

            // Return view with flash message available
            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];
                return view('admin.edit-waktuTempuh', compact('profile', 'data'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function updateWaktuTempuh(Request $request)
    {
        // Ambil data input dari form
        $data = $request -> all();

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-waktu-tempuh', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Waktu Tempuh berhasil diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Waktu Tempuh gagal diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
    }

    public function editJarakTempuh(string $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $response = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

            // Return view with flash message available
            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];
                return view('admin.edit-jarakTempuh', compact('profile', 'data'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    public function updateJarakTempuh(Request $request)
    {
        // Ambil data input dari form
        $data = $request -> all();

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-jarak-tempuh', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Jarak Tempuh berhasil diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Jarak Tempuh gagal diperbarui.');
            return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
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
    public function destroy(int $id)
    {
        $searchResponse = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

        // Return view with flash message available
        if (!$searchResponse -> ok() || $searchResponse === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $searchResponse['data'];

            // Kirim data ke Laravel API
            $deleteResponse = Http::post('http://localhost:8000/api/delete-jadwal', $data);

            // Proses respons dari API
            if ($deleteResponse -> ok()) {
                // Data jadwal berhasil dihapus
                session() -> flash('alert', 'Jadwal berhasil dihapus.');
                return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Jadwal Berhasil Dihapus!']);
            } else {
                // Terjadi kesalahan saat menghapus data jadwal
                session() -> flash('alert', 'Jadwal gagal dihapus.');
                return redirect() -> route('admin_jadwal_index', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Jadwal Gagal Dihapus!']);
            }
        }
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
