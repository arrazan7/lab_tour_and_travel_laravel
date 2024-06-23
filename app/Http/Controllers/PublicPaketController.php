<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicPaketController extends Controller
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
                $lokasi = [];
                $tema = [];
                $durasi = [];
                $harga = [];
                return view('public.home', compact('profile', 'data', 'lokasi', 'tema', 'durasi', 'harga'));
            }
        }
        else {
            // Handle potential token-related errors (e.g., expired token)
            session() -> forget('access_token'); // Clear token on error
            return redirect() -> route('login_akun') -> with('error', 'Your session has expired. Please log in again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function filter(Request $request)
    {
        // Mengambil data checkbox lokasi yang dicentang/dipilih
        $lokasi = [];
        for ($i = 1; $i <= 4; $i++) {
            $namaCheckbox = "lokasi" . $i;
            if ($request -> input($namaCheckbox)) {
                $lokasi[] = $request -> input($namaCheckbox);
            }
        }

        // Mengambil data checkbox tema yang dicentang/dipilih
        $tema = [];
        for ($i = 1; $i <= 26; $i++) {
            $namaCheckbox = "id_tema" . $i;
            if ($request -> input($namaCheckbox)) {
                $tema[] = $request -> input($namaCheckbox);
            }
        }

        // Mengambil data checkbox durasi yang dicentang/dipilih
        // 1, 2, 3, 4, >4
        $durasi = [];
        for ($i = 1; $i <= 5; $i++) {
            $namaCheckbox = "durasi" . $i;
            if ($request -> input($namaCheckbox)) {
                $durasi[] = $request -> input($namaCheckbox);
            }
        }

        // Mengambil data checkbox harga yang dicentang/dipilih
        // Rp0 - Rp50.000, Rp50.001 - Rp150.000, Rp150.001 - Rp300.000, Rp300.001 - Rp500.000, Rp500.001 - ...
        $harga = [];
        for ($i = 1; $i <= 5; $i++) {
            $namaCheckbox = "harga" . $i;
            if ($request -> input($namaCheckbox)) {
                $harga[] = $request -> input($namaCheckbox);
            }
        }

        // Ambil data input dari form
        $filterData = [
            'lokasi' => $lokasi,
            'tema' => $tema,
            'durasi' => $durasi,
            'harga' => $harga
        ];

        session() -> put('filterData', $filterData);
        return redirect() -> route('public_paket_filter');
    }

    /**
     * Display a listing of the resource.
     */
    public function indexFilter()
    {
        $accessToken = session() -> get('access_token'); // Retrieve token from session

        $responseProfile = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ]) -> get('http://localhost:8000/api/profile');

        if ($responseProfile -> ok()) {
            // Berhasil mendapat data profile
            $profile = $responseProfile -> json()['data'];

            $filterData = session() -> get('filterData');
            if (empty($filterData)) {
                $filterData = [
                    'lokasi' => [],
                    'tema' => [],
                    'durasi' => [],
                    'harga' => []
                ];
            }
            // Kirim data ke Laravel API
            $response = Http::post('http://localhost:8000/api/filter-paket', $filterData);

            // Return view with filtered data
            if (!$response -> ok() || $response === null) {
                echo "Kesalahan saat mengambil data dari API";
                exit;
            }
            else {
                $filter = $response['filter'];
                $data = $response['data'];
                return view('public.paket', compact('profile', 'filter', 'data'));
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




    // Custom
    public function customPaket()
    {
        return view('pesan-custom.custom');
    }
    public function customPilihTiket()
    {
        return view('pesan-custom.pilih-tiket');
    }
    public function customDataDiri()
    {
        return view('pesan-custom.data-diri');
    }
    public function customKonfirmasi()
    {
        return view('pesan-custom.konfirmasi');
    }

    // Pemesanan
    public function pilihPaket()
    {
        return view('pesan-paket.pilih-paket');
    }
    public function dataDiri()
    {
        return view('pesan-paket.data-diri');
    }
    public function konfirmasi()
    {
        return view('pesan-paket.konfirmasi');
    }
    public function buktiPembayaran()
    {
        return view('pesan-paket.bukti-pembayaran');
    }

    // User Profile
    public function waiting()
    {
        return view('user.menunggu');
    }
    public function accepted()
    {
        return view('user.disetujui');
    }
    public function rejected()
    {
        return view('user.ditolak');
    }
    public function paid()
    {
        return view('user.dibayar');
    }
    public function done()
    {
        return view('user.selesai');
    }
}
