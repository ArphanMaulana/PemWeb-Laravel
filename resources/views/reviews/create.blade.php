@extends('layouts.main')

@section('title', 'Tambah Ulasan')

@section('page-title', 'Tambah Ulasan')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk menambahkan ulasan -->
      <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <!-- Film -->
        <div class="mb-3">
          <label class="form-label">Film</label>
          <select class="form-select @error('movie_id') is-invalid @enderror" name="movie_id">
            <option value="">Pilih Film</option>
            @foreach ($movies as $movie)
              <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                {{ $movie->title }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Pengulas -->
        <div class="mb-3">
          <label class="form-label">Pengulas</label>
          <select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
            <option value="">Pilih Pengulas</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Ulasan -->
        <div class="mb-3">
          <label class="form-label">Ulasan</label>
          <textarea class="form-control @error('review') is-invalid @enderror" name="review" rows="4"
                    placeholder="Masukkan ulasan">{{ old('review') }}</textarea>
        </div>

        <!-- Rating -->
        <div class="mb-3">
          <label class="form-label">Rating</label>
          <input required type="number" class="form-control @error('rating') is-invalid @enderror" name="rating"
                 placeholder="Masukkan rating (1-5)" value="{{ old('rating') }}" min="1" max="5">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Tambah Ulasan
        </button>
      </form>
    </div>
  </div>
@endsection
