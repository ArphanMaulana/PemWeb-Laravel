@extends('layouts.main')

@section('title', 'Lihat Peran')

@section('page-title', 'Lihat Peran')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk mengubah peran -->
      <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input readonly type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                 placeholder="Masukkan nama peran" value="{{ old('name', $role->name) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </form>
    </div>
  </div>
@endsection
