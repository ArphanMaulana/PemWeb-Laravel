@extends('layouts.main')

@section('title', 'Lihat Pemeran')

@section('page-title', 'Lihat Pemeran')

@section('content')
  <div class="card">
    <div class="card-body">
      <form>
        <!-- Nama -->
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="name" value="{{ $cast->name }}" readonly>
        </div>

        <!-- Usia -->
        <div class="mb-3">
          <label class="form-label">Usia</label>
          <input type="number" class="form-control" name="age" value="{{ $cast->age }}" readonly>
        </div>

        <!-- Biodata -->
        <div class="mb-3">
          <label class="form-label">Biodata</label>
          <textarea class="form-control" name="biodata" rows="4" readonly>{{ $cast->biodata }}</textarea>
        </div>

        <!-- Avatar -->
        <div class="mb-3">
          <label class="form-label">Avatar</label>
          <img id="avatarPreview" src="{{ $cast->avatar }}" alt="Preview Avatar"
               style="max-width: 100px; margin-top: 10px;">
        </div>
      </form>
    </div>
  </div>
@endsection
