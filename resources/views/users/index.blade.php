@extends('layouts.main')

@section('title', 'Daftar Pengguna')

@section('page-title', 'Daftar Pengguna')

@section('actions')
  <a href="{{ route('users.create') }}" class="btn btn-primary d-none d-sm-inline-block">
    Tambah Pengguna
  </a>
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <div id="table-default" class="table-responsive">
        <table class="table">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat Surel</th>
            <th>Peran</th>
            <th>Biodata</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Avatar</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role }}</td>
              <td>{{ $user->profile->biodata }}</td>
              <td>{{ $user->profile->age }}</td>
              <td>{{ $user->profile->address }}</td>
              <td>
                <img src="{{ $user->profile->avatar }}" alt="Avatar" style="max-width: 100px; height: auto;">
              </td>
              <td>
                <!-- Tombol Lihat -->
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info" title="Lihat">
                  Lihat
                </a>
                <!-- Tombol Edit -->
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning" title="Edit">
                  Ubah
                </a>
                <!-- Tombol Delete -->
                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                      style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Delete"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
