<?php

namespace Database\Seeders;

use App\Models\Cast;
use Illuminate\Database\Seeder;

class CastSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Create 10 sample Cast records using the factory
    Cast::factory()->count(4)->create();
  }
}
