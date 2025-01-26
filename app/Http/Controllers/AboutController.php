<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{
    public function index()
    {
        $url = 'https://the-lazy-media-api.vercel.app/api/games';
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

    public function showDetail($year, $month, $day, $slug)
    {
        $key = "{$year}/{$month}/{$day}/{$slug}";
        $url = "https://the-lazy-media-api.vercel.app/api/detail/{$key}";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['results'])) {
                return view('viewdetail', [
                    'detail' => $data['results'],
                    'active' => 'about'
                ]);
            } else {
                return view('error', ['message' => 'Data detail tidak valid']);
            }
        } else {
            return view('error', ['message' => 'Gagal mengambil data detail dari API']);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('search'); // Ambil nilai query dari input search

        // Endpoint API untuk pencarian
        $url = 'https://the-lazy-media-api.vercel.app/api/search';
        
        // Jika ada query pencarian, tambahkan ke parameter URL
        if ($query) {
            $url .= '?search=' . urlencode($query);
        }

        // Kirim permintaan ke API
        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json(); // Ambil data dari respons API

            return view('about', [
                'data' => $data, // Kirim hasil pencarian ke view
                'active' => 'about',
            ]);
        } else {
            // Jika gagal mengambil data dari API, tampilkan pesan error
            return view('error', ['message' => 'Gagal mengambil data dari API']);
        }
    }


    
}