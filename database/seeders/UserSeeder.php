<?php

  namespace Database\Seeders;

  use App\Models\Role;
  use App\Models\User;
  use Illuminate\Database\Seeder;

  class UserSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $adminRole = Role::firstOrCreate(['name' => 'Admin']);
      $reviewerRole = Role::firstOrCreate(['name' => 'Reviewer']);

      User::factory()->create([
        'role_id' => $adminRole->id,
      ]);

      User::factory()->count(15)->create([
        'role_id' => $reviewerRole->id,
      ]);
    }
  }
