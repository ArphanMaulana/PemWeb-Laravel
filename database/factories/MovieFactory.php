<?php

  namespace Database\Factories;

  use App\Models\Movie;
  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

  /**
   * @extends Factory<Movie>
   */
  class MovieFactory extends Factory
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
        'title' => fake()->sentence(),
        'synopsis' => fake()->paragraph(),
        'poster' => fake()->imageUrl(),
        'year' => fake()->year(),
        'available' => fake()->boolean(),
      ];
    }
  }
