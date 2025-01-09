@extends('layouts.main')

@section('title', 'Lihat Ulasan')

@section('page-title', 'Lihat Ulasan')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Film -->
      <div class="mb-3">
        <label class="form-label">Film</label>
        <input type="text" class="form-control" value="{{ $review->movie->title }}" readonly>
      </div>

      <!-- Pengulas -->
      <div class="mb-3">
        <label class="form-label">Pengulas</label>
        <input type="text" class="form-control" value="{{ $review->user->name }}" readonly>
      </div>

      <!-- Ulasan -->
      <div class="mb-3">
        <label class="form-label">Ulasan</label>
        <textarea class="form-control" rows="4" readonly>{{ $review->review }}</textarea>
      </div>

      <!-- Rating -->
      <div class="mb-3">
        <label class="form-label">Rating</label>
        <input type="text" class="form-control" value="{{ $review->rating }}" readonly>
      </div>
    </div>
  </div>
@endsection
