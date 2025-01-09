@extends('layouts.main')

@section('title', 'Lihat Pengguna')

@section('page-title', 'Lihat Pengguna')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Nama -->
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label">Alamat Surel</label>
        <input type="email" class="form-control" value="{{ $user->email }}" readonly>
      </div>

      <!-- Role -->
      <div class="mb-3">
        <label class="form-label">Peran</label>
        <input type="text" class="form-control" value="{{ $user->role->name }}" readonly>
      </div>

      <!-- Biodata -->
      <div class="mb-3">
        <label class="form-label">Biodata</label>
        <textarea class="form-control" rows="4" readonly>{{ $user->profile->biodata }}</textarea>
      </div>

      <!-- Age -->
      <div class="mb-3">
        <label class="form-label">Umur</label>
        <input type="number" class="form-control" value="{{ $user->profile->age }}" readonly>
      </div>

      <!-- Address -->
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" rows="3" readonly>{{ $user->profile->address }}</textarea>
      </div>

      <!-- Avatar -->
      <div class="mb-3">
        <label class="form-label">Avatar</label>
        <img src="{{ $user->profile->avatar }}" alt="Avatar" style="max-width: 100px; margin-top: 10px;">
      </div>
    </div>
  </div>
@endsection
