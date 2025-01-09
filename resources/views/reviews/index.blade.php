@extends('layouts.main')

@section('title', 'Daftar Ulasan')

@section('page-title', 'Daftar Ulasan')

@section('actions')
  <a href="{{ route('reviews.create') }}" class="btn btn-primary d-none d-sm-inline-block">
    Tambah Ulasan
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
            <th>Judul Film</th>
            <th>Pengulas</th>
            <th>Ulasan</th>
            <th>Peringkat</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($reviews as $review)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $review->movie->title }}</td>
              <td>{{ $review->user->name }}</td>
              <td>{{ $review->review }}</td>
              <td>{{ $review->rating }}</td>
              <td>
                <!-- Tombol Lihat -->
                <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info" title="Lihat">
                  Lihat
                </a>
                <!-- Tombol Edit -->
                <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning" title="Edit">
                  Edit
                </a>
                <!-- Tombol Delete -->
                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                      style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Delete"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">
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
