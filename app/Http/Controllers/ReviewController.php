<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  public function index(): View|Factory|Application
  {
    $reviews = Review::with(['movie', 'user'])->get();
    return view('reviews.index', compact('reviews'));
  }

  public function store(Request $request): RedirectResponse
  {
    Review::create($request->all());
    return redirect()->route('reviews.index');
  }

  public function create(): View|Factory|Application
  {
    $movies = Movie::all();
    $users = User::all();
    return view('reviews.create', compact('movies', 'users'));
  }

  public function show(Review $review): View|Factory|Application
  {
    return view('reviews.show', compact('review'));
  }

  public function edit(Review $review): View|Factory|Application
  {
    $movies = Movie::all();
    $users = User::all();
    return view('reviews.edit', compact('review', 'movies', 'users'));
  }

  public function update(Request $request, Review $review): RedirectResponse
  {
    $review->update($request->all());
    return redirect()->route('reviews.index');
  }

  public function destroy(Review $review): RedirectResponse
  {
    $review->delete();
    return redirect()->route('reviews.index');
  }
}
