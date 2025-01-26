<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{
    public function index()
    {
        $url = 'https://the-lazy-media-api.vercel.app/api/detail/2021/01/28/balan-wonderworld-preview';
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json(); // Langsung ambil data dari respons API

            // Pastikan data adalah array dan tidak kosong
            if (is_array($data) && count($data) > 0) {
                return view('about', [
                    'data' => $data, // Kirim data langsung ke view
                    'active' => 'about'
                ]);
            } else {
                // Jika data tidak valid, tampilkan pesan error
                return view('error', ['message' => 'Data dari API tidak valid']);
            }
        } else {
            // Jika gagal mengambil data dari API, tampilkan pesan error
            return view('error', ['message' => 'Gagal mengambil data dari API']);
        }
    }
}