@extends('layouts.main')

@section('container')
    <h1 class="mb-4 text-center">About</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/api/search?search=gta" method="get">
                
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request("search") }}">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($data) && count($data) > 0)
        <div class="row">
            @foreach($data as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Gambar Thumbnail -->
                        <img src="{{ $item['thumb'] ?? '#' }}" class="card-img-top" alt="{{ $item['title'] ?? 'Gambar Tidak Tersedia' }}">

                        <div class="card-body">
                            <!-- Judul -->
                            <h5 class="card-title">{{ $item['title'] ?? 'Judul Tidak Tersedia' }}</h5>

                            <!-- Author -->
                            <p class="card-text">
                                <small class="text-muted">
                                    <strong>Penulis:</strong> {{ $item['author'] ?? 'Penulis Tidak Tersedia' }}
                                </small>
                            </p>

                            <!-- Tanggal -->
                            <p class="card-text">
                                <small class="text-muted">
                                    <strong>Tanggal:</strong> {{ $item['time'] ?? 'Tanggal Tidak Tersedia' }}
                                </small>
                            </p>

                            <!-- Kategori -->
                            <p class="card-text">
                                <small class="text-muted">
                                    <strong>Kategori:</strong> {{ $item['tag'] ?? 'Kategori Tidak Tersedia' }}
                                </small>
                            </p>

                            <!-- Deskripsi -->
                            <p class="card-text">{{ $item['desc'] ?? 'Deskripsi Tidak Tersedia' }}</p>

                            <!-- Tombol Baca Selengkapnya -->
                            <a href="{{ url('/detail/' . ($item['key'] ?? '#')) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            Data tidak tersedia.
        </div>
    @endif
@endsection