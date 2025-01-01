<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::all();
    return view('role.index', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Role::create([
      'name' => $request->name,
    ]);

    return redirect()->route('roles.index')->with('success', 'Peran berhasil ditambahkan!');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('role.create');
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role)
  {
    return view('role.show', compact('role'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    return view('role.edit', compact('role'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Role $role)
  {
    $role->update([
      'name' => $request->name,
    ]);

    return redirect()->route('roles.index')->with('success', 'Peran berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role)
  {
    $role->delete();

    return redirect()->route('roles.index')->with('success', 'Peran berhasil dihapus!');
  }
}
