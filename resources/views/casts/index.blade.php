@extends('layouts.main')

@section('title', 'Daftar Pemeran')

@section('page-title', 'Daftar Pemeran')

@section('actions')
  <a href="{{ route('casts.create') }}" class="btn btn-primary d-none d-sm-inline-block">
    Tambah Pemeran
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
            <th>Usia</th>
            <th>Biodata</th>
            <th>Avatar</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($casts as $cast)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $cast->name }}</td>
              <td>{{ $cast->age }}</td>
              <td>{{ $cast->biodata }}</td>
              <td>
                <img src="{{ $cast->avatar }}" alt="Avatar" style="max-width: 100px;">
              </td>
              <td>
                <!-- Tombol Lihat -->
                <a href="{{ route('casts.show', $cast->id) }}" class="btn btn-info" title="Lihat">
                  Lihat
                </a>
                <!-- Tombol Edit -->
                <a href="{{ route('casts.edit', $cast->id) }}" class="btn btn-warning" title="Edit">
                  Ubah
                </a>
                <!-- Tombol Delete -->
                <form action="{{ route('casts.destroy', $cast->id) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Delete"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus pemeran ini?')">
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
