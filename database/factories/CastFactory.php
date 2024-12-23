<?php

  namespace Database\Factories;

  use App\Models\Cast;
  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

  /**
   * @extends Factory<Cast>
   */
  class CastFactory extends Factory
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
        'name' => $this->faker->name(),
        'age' => $this->faker->numberBetween(20, 60),
        'biodata' => $this->faker->paragraph(),
        'avatar' => $this->faker->imageUrl(200, 200, 'people', true, 'Cast Avatar'),
      ];
    }
  }
