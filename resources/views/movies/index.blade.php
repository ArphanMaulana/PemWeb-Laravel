@extends('layouts.main')

@section('title', 'Daftar Film')

@section('page-title', 'Daftar Film')

@section('actions')
  <a href="{{ route('movies.create') }}" class="btn btn-primary d-none d-sm-inline-block">
    Tambah Film
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
            <th>Judul</th>
            <th>Tahun</th>
            <th>Genre</th>
            <th>Pemeran</th>
            <th>Sinopsis</th>
            <th>Poster</th>
            <th>Tersedia</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($movies as $movie)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $movie->title }}</td>
              <td>{{ $movie->year }}</td>
              <td>{{ $movie->genre }}</td>
              <td>
                {{ $movie->casts }}
              </td>
              <td>{{ $movie->synopsis }}</td>
              <td>
                <img src="{{ $movie->poster }}" alt="Poster" style="max-width: 100px; height: auto;">
              </td>
              <td>
                {{ $movie->available }}
              </td>
              <td>
                <!-- Tombol Lihat -->
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info" title="Lihat">
                  Lihat
                </a>
                <!-- Tombol Edit -->
                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning"
                   title="Edit">
                  Edit
                </a>
                <!-- Tombol Delete -->
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST"
                      style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Delete"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?')">
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
