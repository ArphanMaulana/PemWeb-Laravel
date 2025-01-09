@extends('layouts.main')

@section('title', 'Tambah Pemeran')

@section('page-title', 'Tambah Pemeran')

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('casts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Nama -->
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input required type="text" class="form-control" name="name" placeholder="Masukkan nama pemeran"
                 value="{{ old('name') }}">
        </div>

        <!-- Usia -->
        <div class="mb-3">
          <label class="form-label">Usia</label>
          <input required type="number" class="form-control" name="age" placeholder="Masukkan usia pemeran"
                 value="{{ old('age') }}">
        </div>

        <!-- Biodata -->
        <div class="mb-3">
          <label class="form-label">Biodata</label>
          <textarea class="form-control" name="biodata" rows="4"
                    placeholder="Masukkan biodata pemeran">{{ old('biodata') }}</textarea>
        </div>

        <!-- Avatar -->
        <div class="mb-3">
          <label class="form-label">Avatar</label>
          <input type="file" class="form-control" name="avatar" id="avatarInput" onchange="previewAvatar()">
          <img id="avatarPreview" src="#" alt="Preview Avatar"
               style="max-width: 100px; margin-top: 10px; display: none;">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Tambah Pemeran
        </button>
      </form>
    </div>
  </div>

  <script>
    function previewAvatar() {
      const input = document.getElementById('avatarInput');
      const preview = document.getElementById('avatarPreview');

      if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
      } else {
        preview.style.display = 'none';
      }
    }
  </script>
@endsection
