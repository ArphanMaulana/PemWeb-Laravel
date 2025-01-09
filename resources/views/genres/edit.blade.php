@extends('layouts.main')

@section('title', 'Ubah Genre')

@section('page-title', 'Ubah Genre')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk mengubah genre -->
      <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Nama Genre</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                 placeholder="Masukkan nama genre" value="{{ old('name', $genre->name) }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Ubah Genre
        </button>
      </form>
    </div>
  </div>
@endsection
