<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function index(): View|Factory|Application
  {
    $users = User::with(['role', 'profile', 'reviews'])->get();

    foreach ($users as $user) {
      if (!str_starts_with($user->profile->avatar, 'http') && !str_starts_with($user->profile->avatar, 'https')) {
        $user->profile->avatar = asset('storage/' . $user->profile->avatar);
      }

      $user->role = $user->role->name ?? 'Belum ada peran';
    }

    return view('users.index', compact('users'));
  }


  public function edit(User $user): View|Factory|Application
  {
    $roles = Role::all();

    if ($user->profile->avatar) {
      if (!str_starts_with($user->profile->avatar, 'http') && !str_starts_with($user->profile->avatar, 'https')) {
        $user->profile->avatar = asset('storage/' . $user->profile->avatar);
      }
    }

    return view('users.edit', compact('user', 'roles'));
  }

  public function show(User $user): View|Factory|Application
  {
    $roles = Role::all();

    if ($user->profile->avatar) {
      if (!str_starts_with($user->profile->avatar, 'http') && !str_starts_with($user->profile->avatar, 'https')) {
        $user->profile->avatar = asset('storage/' . $user->profile->avatar);
      }
    }

    return view('users.show', compact('user', 'roles'));
  }

  public function update(Request $request, User $user): RedirectResponse
  {
    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'role_id' => $request->role_id,
    ]);

    $profileData = [
      'biodata' => $request->biodata,
      'age' => $request->age,
      'address' => $request->address,
      'avatar' => $user->profile?->avatar, // Tetap gunakan avatar lama jika tidak ada file baru
    ];

    if ($request->hasFile('avatar')) {
      if ($user->profile?->avatar) {
        Storage::disk('public')->delete($user->profile->avatar);
      }

      $profileData['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }

    $user->profile()->update($profileData);

    return redirect()->route('users.index');
  }

  public function store(Request $request): RedirectResponse
  {
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role_id' => $request->role_id,
    ]);

    $avatarPath = $request->hasFile('avatar')
      ? $request->file('avatar')->store('avatars', 'public')
      : null;

    $user->profile()->create([
      'biodata' => $request->biodata,
      'age' => $request->age,
      'address' => $request->address,
      'avatar' => $avatarPath,
    ]);

    return redirect()->route('users.index');
  }

  public function create(): View|Factory|Application
  {
    $roles = Role::all();

    return view('users.create', compact('roles'));
  }

  public function destroy(User $user): RedirectResponse
  {
    if ($user->profile && $user->profile->avatar) {
      Storage::disk('public')->delete($user->profile->avatar);
    }

    $user->delete();

    return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
  }
}
