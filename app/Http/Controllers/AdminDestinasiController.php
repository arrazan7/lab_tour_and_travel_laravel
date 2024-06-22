<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class AdminDestinasiController extends Controller
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

            $response = Http::get('http://127.0.0.1:8000/api/read-destinasi');

            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];
                return view('admin.destinasi', compact('profile', 'data'));
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

            return view('admin.tambah-destinasi', compact('profile'));
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
        $request -> validate([
            'nama_destinasi' => 'required|string',
            'jenis' => 'required',
            'kota' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'jam_lokasi' => 'required',
            'harga_wni' => 'required|numeric',
            'harga_wna' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'koordinat' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        // upload image
        if ($request -> hasFile('foto')) {
            $extension = $request -> file('foto') -> getClientOriginalExtension();
            $basename = uniqid() . time();

            $namaFileFoto = "{$basename}.{$extension}";
            $pathFoto = $request -> file('foto') -> storeAs('public/destinasi', $namaFileFoto);
        } else {
            $namaFileFoto = '';
        }

        // Mengambil data checkbox hari_tutup dan tema yang dicentang/dipilih
        $hariTutup = [];
        for ($i = 1; $i <= 7; $i++) {
            $namaCheckbox = "hari_tutup" . $i;
            if ($request -> input($namaCheckbox)) {
                $hariTutup[] = $request->input($namaCheckbox);
            }
        }

        $tema = [];
        for ($i = 1; $i <= 26; $i++) {
            $namaCheckbox = "id_tema" . $i;
            if ($request -> input($namaCheckbox)) {
                $tema[] = $request->input($namaCheckbox);
            }
        }

        if ($request -> input('koordinat')) {
            $koordinat = $request -> input('koordinat');
        }
        else {
            $koordinat = '';
        }

        if ($request -> input('deskripsi')) {
            $deskripsi = $request -> input('deskripsi');
        }
        else {
            $deskripsi = '';
        }

        // Ambil data input dari form
        $dataInput = [
            'nama_destinasi' => $request -> input('nama_destinasi'),
            'jenis' => $request -> input('jenis'),
            'kota' => $request -> input('kota'),
            'jam_buka' => $request -> input('jam_buka'),
            'jam_tutup' => $request -> input('jam_tutup'),
            'jam_lokasi' => $request -> input('jam_lokasi'),
            'harga_wni' => $request -> input('harga_wni'),
            'harga_wna' => $request -> input('harga_wna'),
            'foto' => $namaFileFoto,
            'koordinat' => $koordinat,
            'deskripsi' => $deskripsi,
            'hari_tutup' => $hariTutup,
            'id_tema' => $tema
        ];

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/store-destinasi', $dataInput);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Destinasi berhasil dibuat.');
            return redirect() -> route('admin_destinasi_index') -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Destinasi gagal dibuat.');
            return redirect() -> route('admin_destinasi_index') -> with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $response = Http::get('http://127.0.0.1:8000/api/search-destinasi/' .$id. '');

            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];
                return view('admin.destinasi-detail', compact('profile', 'data'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
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

            $response = Http::get('http://127.0.0.1:8000/api/search-destinasi/' .$id. '');

            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $data = $response['data'];

                $temaData = []; // Membuat array kosong untuk menampung data tema destinasi
                foreach ($response['data']['tema'] as $temaRow) {
                    $temaData[] = $temaRow['id_tema'];
                };

                $tutupData = []; // Membuat array kosong untuk menampung data hari destinasi tutup
                foreach ($response['data']['tutup'] as $tutupRow) {
                    $tutupData[] = $tutupRow['hari_tutup'];
                };

                // Menghindari nilai null
                if (empty($data['foto'])) {
                    $data['foto'] = "X";
                }

                return view('admin.edit-destinasi', compact('profile', 'data', 'temaData', 'tutupData'));
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
        //validate form
        $request->validate([
            'nama_destinasi' => 'required|string',
            'jenis' => 'required',
            'kota' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'jam_lokasi' => 'required',
            'harga_wni' => 'required|numeric',
            'harga_wna' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'koordinat' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        // memberi nama image
        if ($request -> hasFile('foto')) {
            //delete old image
            File::delete(public_path() ."/storage/destinasi/".$foto);

            $extension = $request -> file('foto') -> getClientOriginalExtension();
            $basename = uniqid() . time();

            $namaFileFoto = "{$basename}.{$extension}";
            $pathFoto = $request -> file('foto') -> storeAs('public/destinasi', $namaFileFoto);
        } else {
            $namaFileFoto = '';
        }

        // Mengambil data checkbox hari_tutup dan tema yang dicentang/dipilih
        $hariTutup = [];
        for ($i = 1; $i <= 7; $i++) {
            $namaCheckbox = "hari_tutup" . $i;
            if ($request->input($namaCheckbox)) {
                $hariTutup[] = $request->input($namaCheckbox);
            }
        }

        $tema = [];
        for ($i = 1; $i <= 26; $i++) {
            $namaCheckbox = "id_tema" . $i;
            if ($request->input($namaCheckbox)) {
                $tema[] = $request->input($namaCheckbox);
            }
        }

        if ($request->input('koordinat')) {
            $koordinat = $request -> input('koordinat');
        }
        else {
            $koordinat = '';
        }

        if ($request->input('deskripsi')) {
            $deskripsi = $request -> input('deskripsi');
        }
        else {
            $deskripsi = '';
        }

        // Ambil data input dari form
        $dataInput = [
            'id_destinasi' => $request -> input('id_destinasi'),
            'nama_destinasi' => $request -> input('nama_destinasi'),
            'jenis' => $request -> input('jenis'),
            'kota' => $request -> input('kota'),
            'jam_buka' => $request -> input('jam_buka'),
            'jam_tutup' => $request -> input('jam_tutup'),
            'jam_lokasi' => $request -> input('jam_lokasi'),
            'harga_wni' => $request -> input('harga_wni'),
            'harga_wna' => $request -> input('harga_wna'),
            'foto' => $namaFileFoto,
            'koordinat' => $koordinat,
            'deskripsi' => $deskripsi,
            'hari_tutup' => $hariTutup,
            'id_tema' => $tema
        ];

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-destinasi', $dataInput);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Destinasi berhasil diperbarui.');
            return redirect() -> route('admin_destinasi_show', ['id' => $request -> input('id_destinasi')]) -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Destinasi gagal diperbarui.');
            return redirect() -> route('admin_destinasi_show', ['id' => $request -> input('id_destinasi')]) -> with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $searchResponse = Http::get('http://127.0.0.1:8000/api/search-destinasi/' .$id. '');

        // Return view with flash message available
        if (!$searchResponse -> ok() || $searchResponse === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = [
                'id_destinasi' => $searchResponse['data']['id_destinasi']
            ];

            // Kirim data ke Laravel API
            $deleteResponse = Http::post('http://localhost:8000/api/delete-destinasi', $data);

            // Proses respons dari API
            if ($deleteResponse -> ok()) {
                // delete old image
                if (!empty($searchResponse['data']['foto'])) {
                    //delete old image
                    File::delete(public_path() ."/storage/destinasi/".$searchResponse['data']['foto']);
                }

                // Data berhasil dikirimkan
                session() -> flash('alert', 'Destinasi berhasil dihapus.');
                return redirect() -> route('admin_destinasi_index') -> with(['success' => 'Data Berhasil Dihapus!']);
            } else {
                // Terjadi kesalahan saat mengirim data
                session() -> flash('alert', 'Destinasi gagal dihapus.');
                return redirect() -> route('admin_destinasi_index') -> with(['failed' => 'Data Gagal Dihapus!']);
            }
        }
    }
}
