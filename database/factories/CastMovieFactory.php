<?php

  namespace Database\Factories;

  use App\Models\Cast;
  use App\Models\CastMovie;
  use App\Models\Movie;
  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

  /**
   * @extends Factory<CastMovie>
   */
  class CastMovieFactory extends Factory
  {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'id' => Str::uuid()->toString(),
        'movie_id' => Movie::inRandomOrder()->first()->id,
        'cast_id' => Cast::inRandomOrder()->first()->id,
      ];
    }
  }
