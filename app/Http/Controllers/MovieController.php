<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
  public function index(): View|Factory|Application
  {
    $movies = Movie::with('genre')->get();

    foreach ($movies as $movie) {
      if ($movie->poster && !str_starts_with($movie->poster, 'http') && !str_starts_with($movie->poster, 'https')) {
        $movie->poster = asset('storage/' . $movie->poster);
      }

      $movie->genre = $movie->genre->name ?? 'Belum ada genre';

      $movie->casts = $movie->movieCasts->isNotEmpty()
        ? $movie->movieCasts->map(function ($cast) {
          return $cast->name;
        })->implode(', ')
        : 'Belum ada pemeran';

      $movie->available = $movie->available ? 'Ya' : 'Tidak';
    }

    return view('movies.index', compact('movies'));
  }

  public function show(Movie $movie): View|Factory|Application
  {
    $movie->poster = $movie->poster && !str_starts_with($movie->poster, 'http') && !str_starts_with($movie->poster, 'https')
      ? asset('storage/' . $movie->poster)
      : $movie->poster;

    $movie->casts = $movie->movieCasts->isNotEmpty()
      ? $movie->movieCasts->map(function ($cast) {
        return $cast->name;
      })->implode(', ')
      : 'Belum ada pemeran';

    return view('movies.show', compact('movie'));
  }


  public function edit(Movie $movie): View|Factory|Application
  {
    $movie->poster = $movie->poster && !str_starts_with($movie->poster, 'http') && !str_starts_with($movie->poster, 'https')
      ? asset('storage/' . $movie->poster)
      : $movie->poster;
    
    $genres = Genre::all();
    $casts = Cast::all();
    return view('movies.edit', compact('movie', 'genres', 'casts'));
  }

  public function update(Request $request, Movie $movie): RedirectResponse
  {
    if ($request->hasFile('poster')) {
      if ($movie->poster) {
        Storage::disk('public')->delete($movie->poster);
      }
      $movie->poster = $request->file('poster')->store('posters', 'public');
    }

    $movie->update([
      'title' => $request->title,
      'year' => $request->year,
      'genre_id' => $request->genre_id,
      'synopsis' => $request->synopsis,
      'poster' => $movie->poster,
      'available' => $request->has('available'),
    ]);

    if ($request->has('casts')) {
      $movie->movieCasts()->sync($request->casts);
    } else {
      $movie->movieCasts()->detach();
    }

    return redirect()->route('movies.index');
  }

  public function store(Request $request): RedirectResponse
  {
    $posterPath = $request->hasFile('poster')
      ? $request->file('poster')->store('posters', 'public')
      : null;

    $movie = Movie::create([
      'title' => $request->title,
      'year' => $request->year,
      'genre_id' => $request->genre_id,
      'synopsis' => $request->synopsis,
      'poster' => $posterPath,
      'available' => $request->has('available'),
    ]);

    if ($request->casts) {
      $movie->movieCasts()->sync($request->casts);
    }

    return redirect()->route('movies.index');
  }


  public function create(): View|Factory|Application
  {
    $genres = Genre::all();
    $casts = Cast::all();

    return view('movies.create', compact('genres', 'casts'));
  }

  public function destroy(Movie $movie): RedirectResponse
  {
    if ($movie->poster) {
      Storage::disk('public')->delete($movie->poster);
    }

    $movie->delete();

    return redirect()->route('movies.index');
  }
}
