<?php

  namespace Database\Factories;

  use App\Models\Movie;
  use App\Models\Review;
  use App\Models\User;
  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

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
        'id' => Str::uuid()->toString(),
        'review' => $this->faker->paragraph(),
        'rating' => $this->faker->numberBetween(1, 5),
        'user_id' => User::inRandomOrder()->first()->id,
        'movie_id' => Movie::inRandomOrder()->first()->id,
      ];
    }
  }
