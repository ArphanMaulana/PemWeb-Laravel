@extends('layouts.main')

@section('title', 'Tambah Peran')

@section('page-title', 'Tambah Peran')

@section('content')
  <div class="card">
    <div class="card-body">
      <!-- Form untuk menambahkan peran -->
      <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                 placeholder="Masukkan nama peran" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Tambah Peran
        </button>
      </form>
    </div>
  </div>
@endsection
