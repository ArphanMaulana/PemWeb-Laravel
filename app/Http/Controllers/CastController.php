<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CastController extends Controller
{
  public function index(): View
  {
    $casts = Cast::all();

    foreach ($casts as $cast) {
      if (!str_starts_with($cast->avatar, 'http') && !str_starts_with($cast->avatar, 'https')) {
        $cast->avatar = asset('storage/' . $cast->avatar);
      }
    }

    return view('casts.index', compact('casts'));
  }

  public function edit(Cast $cast): View
  {
    if ($cast->avatar) {
      if (!str_starts_with($cast->avatar, 'http') && !str_starts_with($cast->avatar, 'https')) {
        $cast->avatar = asset('storage/' . $cast->avatar);
      }
    }

    return view('casts.edit', compact('cast'));
  }

  public function show(Cast $cast): View
  {
    if ($cast->avatar) {
      if (!str_starts_with($cast->avatar, 'http') && !str_starts_with($cast->avatar, 'https')) {
        $cast->avatar = asset('storage/' . $cast->avatar);
      }
    }

    return view('casts.show', compact('cast'));
  }

  public function update(Request $request, Cast $cast): RedirectResponse
  {
    if ($request->hasFile('avatar')) {
      if ($cast->avatar) {
        Storage::disk('public')->delete($cast->avatar);
      }
      $cast->avatar = $request->file('avatar')->store('avatars', 'public');
    }

    $cast->update([
      'name' => $request->name,
      'age' => $request->age,
      'biodata' => $request->biodata,
      'avatar' => $cast->avatar,
    ]);

    return redirect()->route('casts.index');
  }

  public function store(Request $request): RedirectResponse
  {
    $avatarPath = $request->hasFile('avatar')
      ? $request->file('avatar')->store('avatars', 'public')
      : null;

    Cast::create([
      'name' => $request->name,
      'age' => $request->age,
      'biodata' => $request->biodata,
      'avatar' => $avatarPath,
    ]);

    return redirect()->route('casts.index')->with('success', 'Cast berhasil ditambahkan.');
  }

  public function create(): View
  {
    return view('casts.create');
  }

  public function destroy(Cast $cast): RedirectResponse
  {
    if ($cast->avatar) {
      Storage::disk('public')->delete($cast->avatar);
    }

    $cast->delete();

    return redirect()->route('casts.index');
  }
}
