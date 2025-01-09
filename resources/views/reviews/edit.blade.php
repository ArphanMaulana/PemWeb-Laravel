@extends('layouts.main')

@section('title', 'Ubah Ulasan')

@section('page-title', 'Ubah Ulasan')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk mengubah ulasan -->
      <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Film -->
        <div class="mb-3">
          <label class="form-label">Film</label>
          <select class="form-select" name="movie_id">
            <option value="">Pilih Film</option>
            @foreach ($movies as $movie)
              <option value="{{ $movie->id }}" {{ old('movie_id', $review->movie_id) == $movie->id ? 'selected' : '' }}>
                {{ $movie->title }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Pengulas -->
        <div class="mb-3">
          <label class="form-label">Pengulas</label>
          <select class="form-select" name="user_id">
            <option value="">Pilih Pengulas</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id', $review->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Ulasan -->
        <div class="mb-3">
          <label class="form-label">Ulasan</label>
          <textarea class="form-control" name="review" rows="4"
                    placeholder="Masukkan ulasan">{{ old('review', $review->review) }}</textarea>
        </div>

        <!-- Rating -->
        <div class="mb-3">
          <label class="form-label">Rating</label>
          <input required type="number" class="form-control" name="rating"
                 placeholder="Masukkan rating (1-5)" value="{{ old('rating', $review->rating) }}" min="1" max="5">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Ubah Ulasan
        </button>
      </form>
    </div>
  </div>
@endsection
