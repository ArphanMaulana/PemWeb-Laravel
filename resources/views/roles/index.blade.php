@extends('layouts.main')

@section('title', 'Daftar Peran')

@section('page-title', 'Daftar Peran')

@section('actions')
  <a href="{{ route('roles.create') }}" class="btn btn-primary d-none d-sm-inline-block">
    Tambah Peran
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
            <th>Name</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $role->name }}</td>
              <td>
                <!-- Tombol Lihat -->
                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info" title="Lihat">
                  Lihat
                </a>
                <!-- Tombol Edit -->
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning" title="Edit">
                  Ubah
                </a>
                <!-- Tombol Delete -->
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Delete"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus peran ini?')">
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
