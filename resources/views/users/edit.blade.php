@extends('layouts.main')

@section('title', 'Ubah Pengguna')

@section('page-title', 'Ubah Pengguna')

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input required type="text" class="form-control" name="name" placeholder="Masukkan nama pengguna"
                 value="{{ old('name', $user->name) }}">
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label">Alamat Surel</label>
          <input required type="email" class="form-control" name="email" placeholder="Masukkan alamat surel"
                 value="{{ old('email', $user->email) }}">
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label class="form-label">Kata Sandi (Kosongkan jika tidak ingin mengubah)</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi baru">
        </div>

        <!-- Role -->
        <div class="mb-3">
          <label class="form-label">Peran</label>
          <select class="form-select" name="role_id">
            <option value="">Pilih Peran</option>
            @foreach ($roles as $role)
              <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Biodata -->
        <div class="mb-3">
          <label class="form-label">Biodata</label>
          <textarea class="form-control" name="biodata" rows="4"
                    placeholder="Masukkan biodata">{{ old('biodata', $user->profile->biodata ?? '') }}</textarea>
        </div>

        <!-- Age -->
        <div class="mb-3">
          <label class="form-label">Umur</label>
          <input required type="number" class="form-control" name="age" placeholder="Masukkan umur"
                 value="{{ old('age', $user->profile->age ?? '') }}">
        </div>

        <!-- Address -->
        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" name="address" rows="3"
                    placeholder="Masukkan alamat">{{ old('address', $user->profile->address ?? '') }}</textarea>
        </div>

        <!-- Avatar -->
        <div class="mb-3">
          <label class="form-label">Avatar</label>
          <input type="file" class="form-control" name="avatar" id="avatarInput" onchange="previewAvatar()">
          <img id="avatarPreview" src="{{ $user->profile->avatar }}" alt="Avatar"
               style="max-width: 100px; margin-top: 10px;">
        </div>

        <button type="submit" class="btn btn-primary w-100">
          Ubah Pengguna
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
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection
