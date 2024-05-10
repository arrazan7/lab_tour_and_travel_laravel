<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JadwalDestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexByID(int $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/read-jadwal/' .$id. '');
        $id_paketdestinasi = $id;

        if (!$response -> ok() || $response === null) {
            return view('read.jadwalDestinasi', compact('id_paketdestinasi'));
            exit;
        }
        else {
            $data = $response['data'];
            return view('read.jadwalDestinasi', compact('data', 'id_paketdestinasi'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        $id_paketdestinasi = $id;

        // Set flash message for alert
        session() -> flash('alert', 'Jadwal destinasi baru akan dibuat.');

        // Return view with flash message available
        return view('create.createJadwal', compact('id_paketdestinasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil data input dari form
        $data = $request -> all();

        // Kirim data ke Laravel API
        $response = Http::post('http://localhost:8000/api/store-jadwal', $data);

        // Proses respons dari API
        if ($response -> ok()) {
            // Data berhasil dikirimkan
            session() -> flash('alert', 'Jadwal destinasi berhasil dibuat.');
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Jadwal destinasi gagal dibuat. id paket = ' .$data['id_paketdestinasi']. '');
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editJamMulai(string $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

        // Return view with flash message available
        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            return view('update.updateJamMulai', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
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
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Jam Mulai gagal diperbarui.');
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
    }

    public function editJamSelesai(string $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

        // Return view with flash message available
        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            return view('update.updateJamSelesai', compact('data'));
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
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'Jam Selesai gagal diperbarui.');
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
    }

    public function editIdDestinasi(string $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

        // Return view with flash message available
        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            return view('update.updateIdDestinasi', compact('data'));
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
            session() -> flash('alert', 'ID Destinasi berhasil diperbarui.');
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            // Terjadi kesalahan saat mengirim data
            session() -> flash('alert', 'ID Destinasi gagal diperbarui.');
            return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $searchResponse = Http::get('http://127.0.0.1:8000/api/search-jadwal/' .$id. '');

        // Return view with flash message available
        if (!$searchResponse -> ok() || $searchResponse === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $searchResponse['data'][0];

            // Kirim data ke Laravel API
            $deleteResponse = Http::post('http://localhost:8000/api/delete-jadwal', $data);

            // Proses respons dari API
            if ($deleteResponse -> ok()) {
                // Data jadwal berhasil dihapus
                session() -> flash('alert', 'Jadwal berhasil dihapus.');
                return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['success' => 'Data Jadwal Berhasil Dihapus!']);
            } else {
                // Terjadi kesalahan saat menghapus data jadwal
                session() -> flash('alert', 'Jadwal gagal dihapus.');
                return redirect() -> route('read_jadwal', ['id' => $data['id_paketdestinasi']]) -> with(['failed' => 'Data Jadwal Gagal Dihapus!']);
            }
        }
    }
}
