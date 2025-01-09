@extends('layouts.main')

@section('title', 'Ubah Peran')

@section('page-title', 'Ubah Peran')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk mengubah peran -->
      <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                 placeholder="Masukkan nama peran" value="{{ old('name', $role->name) }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Ubah Peran
        </button>
      </form>
    </div>
  </div>
@endsection
