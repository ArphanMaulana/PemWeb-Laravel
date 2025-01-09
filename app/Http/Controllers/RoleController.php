<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public function index(): View|Factory|Application
  {
    $roles = Role::all();

    return view('roles.index', compact('roles'));
  }

  public function store(Request $request): RedirectResponse
  {
    Role::create([
      'name' => $request->name,
    ]);

    return redirect()->route('roles.index');
  }

  public function create(): View|Factory|Application
  {
    return view('roles.create');
  }

  public function show(Role $role): View|Factory|Application
  {
    return view('roles.show', compact('role'));
  }

  public function edit(Role $role): View|Factory|Application
  {
    return view('roles.edit', compact('role'));
  }

  public function update(Request $request, Role $role): RedirectResponse
  {
    $role->update([
      'name' => $request->name,
    ]);

    return redirect()->route('roles.index');
  }

  public function destroy(Role $role): RedirectResponse
  {
    $role->delete();

    return redirect()->route('roles.index');
  }
}
