@extends('layouts.main')

@section('title', 'Daftar Genre')

@section('page-title', 'Daftar Genre')

@section('actions')
  <a href="{{ route('genres.create') }}" class="btn btn-primary d-none d-sm-inline-block">
    Tambah Genre
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
            <th>Nama Genre</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($genres as $genre)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $genre->name }}</td>
              <td>
                <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-info" title="Lihat">
                  Lihat
                </a>

                <!-- Tombol Edit -->
                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning"
                   title="Edit">
                  Ubah
                </a>
                <!-- Tombol Delete -->
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST"
                      style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Delete"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus genre ini?')">
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
