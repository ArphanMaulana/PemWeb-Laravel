<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'id' => $this->faker->uuid,
      'review' => $this->faker->paragraph,
      'rating' => $this->faker->numberBetween(1, 5),
      // Fetch a random User and Movie from the database
      'user_id' => User::inRandomOrder()->first()->id,
      'movie_id' => Movie::inRandomOrder()->first()->id,
    ];
  }
}
