@extends('layouts.main')

@section('title', 'Lihat Film')

@section('page-title', 'Lihat Film')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Judul Film -->
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control" value="{{ $movie->title }}" readonly>
      </div>

      <!-- Tahun Rilis -->
      <div class="mb-3">
        <label class="form-label">Tahun Rilis</label>
        <input type="number" class="form-control" value="{{ $movie->year }}" readonly>
      </div>

      <!-- Genre -->
      <div class="mb-3">
        <label class="form-label">Genre</label>
        <input type="text" class="form-control" value="{{ $movie->genre->name ?? 'Tidak ada genre' }}" readonly>
      </div>

      <!-- Pemeran -->
      <div class="mb-3">
        <label class="form-label">Pemeran</label>
        <input type="text" class="form-control"
               value="{{ $movie->casts }}"
               readonly>
      </div>


      <!-- Sinopsis -->
      <div class="mb-3">
        <label class="form-label">Sinopsis</label>
        <textarea class="form-control" rows="4" readonly>{{ $movie->synopsis }}</textarea>
      </div>

      <!-- Poster -->
      <div class="mb-3">
        <label class="form-label">Poster</label>
        <img src="{{ $movie->poster }}" alt="Poster" style="max-width: 100px; margin-top: 10px;">
      </div>

      <!-- Ketersediaan -->
      <div class="mb-3">
        <label class="form-label">Ketersediaan</label>
        <input type="text" class="form-control" value="{{ $movie->available ? 'Tersedia' : 'Tidak Tersedia' }}"
               readonly>
      </div>
    </div>
  </div>
@endsection
