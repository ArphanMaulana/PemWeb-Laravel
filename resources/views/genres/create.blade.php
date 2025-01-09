@extends('layouts.main')

@section('title', 'Tambah Genre')

@section('page-title', 'Tambah Genre')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk menambahkan genre -->
      <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama Genre</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                 placeholder="Masukkan nama genre" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Tambah Genre
        </button>
      </form>
    </div>
  </div>
@endsection
