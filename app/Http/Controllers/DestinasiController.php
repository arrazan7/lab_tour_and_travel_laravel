<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/read-destinasi');

        if (!$response -> ok() || $response === null) {
            echo "Kesalahan saat mengambil data dari API";
            exit;
        }
        else {
            $data = $response['data'];
            return view('read.destinasi', compact('data'));
        }
    }
}
