@extends('layouts.main')

@section('container')
    <h1>About</h1> 
    <h1>Balan Wonderworld Preview</h1>
    @if(isset($data))
        <div>
            <h2>{{ $data['title'] ?? 'Judul Tidak Tersedia' }}</h2>
            <p><strong>Penulis:</strong> {{ $data['author'] ?? 'Penulis Tidak Tersedia' }}</p>
            <p><strong>Tanggal:</strong> {{ $data['date'] ?? 'Tanggal Tidak Tersedia' }}</p>
            <p><strong>Kategori:</strong> {{ implode(', ', $data['categories']) ?? 'Kategori Tidak Tersedia' }}</p>
            <img src="{{ $data['thumb'] ?? '#' }}" alt="{{ $data['title'] ?? 'Gambar Tidak Tersedia' }}" width="300">
            <div>
                <h3>Konten:</h3>
                @foreach ($data['content'] as $paragraph)
                    @if (filter_var($paragraph, FILTER_VALIDATE_URL))
                        <img src="{{ $paragraph }}" alt="Gambar Konten" width="300" style="margin: 10px 0;">
                    @else
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <p>Data tidak tersedia.</p>
    @endif
@endsection