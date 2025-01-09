<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
  public function index(): View|Factory|Application
  {
    $genres = Genre::all();

    return view('genres.index', compact('genres'));
  }

  public function store(Request $request): RedirectResponse
  {
    Genre::create([
      'name' => $request->name,
    ]);

    return redirect()->route('genres.index');
  }

  public function create(): View|Factory|Application
  {
    return view('genres.create');
  }

  public function show(Genre $genre): View|Factory|Application
  {
    return view('genres.show', compact('genre'));
  }

  public function edit(Genre $genre): View|Factory|Application
  {
    return view('genres.edit', compact('genre'));
  }

  public function update(Request $request, Genre $genre): RedirectResponse
  {
    $genre->update([
      'name' => $request->name,
    ]);

    return redirect()->route('genres.index');
  }

  public function destroy(Genre $genre): RedirectResponse
  {
    $genre->delete();

    return redirect()->route('genres.index');
  }
}
