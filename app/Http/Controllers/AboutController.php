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
            $data = $response->json();
            // Pastikan key 'results' ada dalam respons
            if (isset($data['results'])) {
                return view('about',
                    ['data' => $data['results'],
                    'active' => 'about'
                ]);
            } else {
                return view('error', ['message' => 'Data dari API tidak valid']);
            }
        } else {
            return view('error', ['message' => 'Gagal mengambil data dari API']);
        }
    }
}
