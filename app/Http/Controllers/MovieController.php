<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\CastMovie;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $movies = Movie::with('genre')->get();
    return view('movie.index', compact('movies'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Movie $movie)
  {
    $genres = Genre::all(); // Get all genres
    $casts = Cast::all(); // Get all actors (cast)
    return view('movie.show', compact('movie', 'genres', 'casts'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Movie $movie)
  {
    $genres = Genre::all(); // Get all genres
    $casts = Cast::all(); // Get all actors (cast)

    return view('movie.edit', compact('movie', 'genres', 'casts'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Movie $movie)
  {
    // Menangani file poster baru jika ada
    $posterPath = $movie->poster;
    if ($request->hasFile('poster')) {
      // Menghapus poster lama jika ada
      if ($posterPath) {
        unlink(storage_path('app/public/' . $posterPath));
      }
      // Menyimpan poster baru
      $posterPath = $request->file('poster')->store('posters', 'public');
    }

    // Mengupdate data film
    $movie->update([
      'title' => $request->title,
      'synopsis' => $request->synopsis,
      'poster' => $posterPath,
      'year' => $request->year,
      'available' => $request->available,
      'genre_id' => $request->genre_id, // Assuming genre is also updated
    ]);

    // Menambahkan pemeran (casts) ke film
    if ($request->has('casts')) {
      // Mengupdate pemeran (casts) menggunakan sync untuk mengganti semua pemeran yang terkait
      $movie->casts()->sync($request->casts);
    }

    return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui!');
  }


  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Menangani file poster jika ada
    $posterPath = null;
    if ($request->hasFile('poster')) {
      $posterPath = $request->file('poster')->store('posters', 'public');
    }

    // Menyimpan data film
    $movie = Movie::create([
      'title' => $request->title,
      'synopsis' => $request->synopsis,
      'poster' => $posterPath,
      'year' => $request->year,
      'available' => $request->available,
      'genre_id' => $request->genre_id, // Assuming the genre is selected as well
    ]);

    // Menambahkan pemeran (casts) ke film
    if ($request->has('casts')) {
      foreach ($request->casts as $castId) {
        CastMovie::create([
          'movie_id' => $movie->id,
          'cast_id' => $castId,
        ]);
      }
    }

    return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan!');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $genres = Genre::all(); // Get all genres
    $casts = Cast::all(); // Get all actors (cast)

    return view('movie.create', compact('genres', 'casts'));
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Movie $movie)
  {
    // Menghapus poster file jika ada
    if ($movie->poster) {
      unlink(storage_path('app/public/' . $movie->poster));
    }

    // Menghapus film dari database
    $movie->delete();

    return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus!');
  }
}
