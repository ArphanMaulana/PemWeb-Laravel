<?php

  namespace Database\Factories;

  use App\Models\Genre;
  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

  /**
   * @extends Factory<Genre>
   */
  class GenreFactory extends Factory
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
        'name' => $this->faker->unique()->randomElement([
          'Action', 'Comedy', 'Drama', 'Horror', 'Romance', 'Thriller', 'Sci-Fi', 'Fantasy', 'Documentary', 'Animation'
        ]),
      ];
    }
  }

