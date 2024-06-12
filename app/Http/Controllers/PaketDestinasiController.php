<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class PaketDestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/read-paket');
        $dataPaketDestinasi = json_decode($response -> getBody(), true);

        if (!$response -> ok() || $dataPaketDestinasi === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $dataPaketDestinasi['data'];
            return view('read.paketDestinasi', compact('data'));
        }
    }

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

        // Mengambil data checkbox durasi yang dicentang/dipilih
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

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/filter-paket', $filterData);

        // Return view with flash message available
        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            return view('read.filterPaket', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Set flash message for alert
        session() -> flash('alert', 'Paket destinasi baru akan dibuat.');

        // Return view with flash message available
        return view('create.createPaket');
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

        //upload image
        if ($request -> hasFile('foto')) {
            $extension = $request -> file('foto') -> getClientOriginalExtension();
            $basename = uniqid() . time();

            $namaFileFoto = "{$basename}.{$extension}";
            $pathFoto = $request -> file('foto') -> storeAs('public/paket_destinasi', $namaFileFoto);
        } else {
            $namaFileFoto = '';
        }

        // Ambil data input dari form
        $data = [
            'id_profile' => $request -> input('id_profile'),
            'nama_paket' => $request -> input('nama_paket'),
            'foto' => $namaFileFoto
        ];

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/store-paket', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Paket Destinasi berhasil dibuat.');
            return redirect() -> route('read_paket') -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Paket Destinasi gagal dibuat.');
            return redirect() -> route('read_paket') -> with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/search-paket/' .$id. '');

        // Return view with flash message available
        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            if (!empty($data['foto'])) {
                return view('update.updatePaket', compact('data'));
            }
            else {
                $data['foto'] = "X";
                return view('update.updatePaket', compact('data'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $foto)
    {
        //validate form
        $request->validate([
            'nama_paket' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000'
        ]);

        // memberi nama image
        if ($request -> hasFile('foto')) {
            //delete old image
            File::delete(public_path() ."/storage/paket_destinasi/".$foto);

            $extension = $request -> file('foto') -> getClientOriginalExtension();
            $basename = uniqid() . time();

            $namaFileFoto = "{$basename}.{$extension}";
            $pathFoto = $request -> file('foto') -> storeAs('public/paket_destinasi', $namaFileFoto);
        } else {
            $namaFileFoto = "";
        };

        // Ambil data input dari form
        $data = [
            'id_paketdestinasi' => $request -> input('id_paketdestinasi'),
            'nama_paket' => $request -> input('nama_paket'),
            'foto' => $namaFileFoto
        ];

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-paket', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Paket Destinasi berhasil diperbarui.');
            return redirect() -> route('read_paket') -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Paket Destinasi gagal diperbarui.');
            return redirect() -> route('read_paket') -> with(['failed' => 'Data Gagal Disimpan!']);
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
                'durasi_wisata' => $searchResponse['data']['durasi_wisata']
            ];

            // Kirim data ke Laravel API
            $deleteResponse = Http::post('http://localhost:8000/api/delete-paket', $data);

            // Proses respons dari API
            if ($deleteResponse -> ok()) {
                // delete old image
                if (!empty($searchResponse['data']['foto'])) {
                    //delete old image
                    File::delete(public_path() ."/storage/paket_destinasi/".$searchResponse['data']['foto']);
                }

                // Data berhasil dikirimkan
                session() -> flash('alert', 'Paket Destinasi berhasil dihapus.');
                return redirect() -> route('read_paket') -> with(['success' => 'Data Berhasil Dihapus!']);
            } else {
                // Terjadi kesalahan saat mengirim data
                session() -> flash('alert', 'Paket Destinasi gagal dihapus.');
                return redirect() -> route('read_paket') -> with(['failed' => 'Data Gagal Dihapus!']);
            }
        }
    }

    public function createCustom()
    {
        // Set flash message for alert
        session() -> flash('alert', 'Custom Paket Destinasi baru akan dibuat.');

        // Return view with flash message available
        return view('create.createCustom');
    }
}
