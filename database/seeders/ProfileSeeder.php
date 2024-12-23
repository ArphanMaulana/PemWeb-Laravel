<?php

  namespace Database\Seeders;

  use App\Models\Profile;
  use App\Models\User;
  use Illuminate\Database\Seeder;
  use Illuminate\Support\Str;

  class ProfileSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::all()->each(function ($user) {
        Profile::factory()->create(['id' => Str::uuid()->toString(), 'user_id' => $user->id]);
      });
    }
  }
