<?php

namespace Database\Seeders;

use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class CastMovieSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Fetch all movies
    $movies = Movie::all();

    // Fetch all casts
    $casts = Cast::all();

    // Associate casts with movies (randomly)
    foreach ($movies as $movie) {
      // Randomly attach 2-4 casts to each movie
      $movie->casts()->attach(
        $casts->random(rand(2, 4))->pluck('id')->toArray()
      );
    }
  }
}
