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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function editNama(string $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/search-paket/' .$id. '');

        // Return view with flash message available
        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            return view('update.updateNamaPaket', compact('data'));
        }
    }

    public function updateNamaPaket(Request $request)
    {
        // Ambil data input dari form
        $data = $request -> all();

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-nama-paket', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Nama Paket Destinasi berhasil diperbarui.');
            return redirect() -> route('read_paket') -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Nama Paket Destinasi gagal diperbarui.');
            return redirect() -> route('read_paket') -> with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editFoto(string $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/search-paket/' .$id. '');

        // Return view with flash message available
        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            if (!empty($data[0]['foto'])) {
                return view('update.updateFotoPaket', compact('data'));
            }
            else {
                $data[0]['foto'] = "X";
                return view('update.updateFotoPaket', compact('data'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateFotoPaket(Request $request, string $foto)
    {
        if ($request -> hasFile('foto')) {
            $request->validate([
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            ]);
            //delete image
            File::delete(public_path() ."/storage/paket_destinasi/".$foto);

            $extension = $request -> file('foto') -> getClientOriginalExtension();
            $basename = uniqid() . time();

            $namaFileFoto = "{$basename}.{$extension}";
            $pathFoto = $request -> file('foto') -> storeAs('public/paket_destinasi', $namaFileFoto);
        } else {
            $request->validate([
                'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            ]);
            //delete image
            File::delete(public_path() ."/storage/paket_destinasi/".$foto);

            $namaFileFoto = "";
        };

        // Ambil data input dari form
        $data = [
            'id_paketdestinasi' => $request -> input('id_paketdestinasi'),
            'foto' => $namaFileFoto
        ];

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/update-foto-paket', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Foto Paket Destinasi berhasil diperbarui.');
            return redirect() -> route('read_paket') -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Foto Paket Destinasi gagal diperbarui.');
            return redirect() -> route('read_paket') -> with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createCustom()
    {
        // Set flash message for alert
        session() -> flash('alert', 'Custom Paket Destinasi baru akan dibuat.');

        // Return view with flash message available
        return view('create.createCustom');
    }
}
