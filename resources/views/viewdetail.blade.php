@extends('layouts.main')

@section('container')
    <h1 class="mb-4 text-center">{{ $detail['title'] }}</h1>

    <p class="text-center">
        <strong>Penulis:</strong> {{ $detail['author'] }} <br>
        <strong>Tanggal:</strong> {{ $detail['date'] }}
    </p>

    <div class="text-center mb-4">
        <strong>Kategori:</strong>
        @foreach ($detail['categories'] as $category)
            <span class="badge bg-secondary">{{ $category }}</span>
        @endforeach
    </div>

    <!-- Gambar Utama -->
    @if (!empty($detail['content'][0]) && strpos($detail['content'][0], 'http') !== false)
        <div class="text-center">
            <img src="{{ $detail['content'][0] }}" class="img-fluid mb-4" alt="{{ $detail['title'] }}">
        </div>
    @endif

    <!-- Konten -->
    <div class="content">
        @foreach ($detail['content'] as $content)
            @if (str_contains($content, 'http') && str_contains($content, 'youtube'))
                <!-- Video -->
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe class="embed-responsive-item" src="{{ $content }}" allowfullscreen></iframe>
                </div>
            @elseif (!str_contains($content, 'http'))
                <p>{{ $content }}</p>
            @endif
        @endforeach
    </div>
@endsection
