@extends('layouts.main')

@section('title', 'Lihat Genre')

@section('page-title', 'Lihat Genre')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk melihat genre -->
      <form>
        <div class="mb-3">
          <label class="form-label">Nama Genre</label>
          <input type="text" class="form-control" name="name" value="{{ $genre->name }}" readonly>
        </div>
      </form>
    </div>
  </div>
@endsection
