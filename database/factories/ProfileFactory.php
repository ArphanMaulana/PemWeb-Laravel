<?php

  namespace Database\Factories;

  use App\Models\Profile;
  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

  /**
   * @extends Factory<Profile>
   */
  class ProfileFactory extends Factory
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
        'biodata' => fake()->paragraph(),
        'age' => fake()->numberBetween(18, 80),
        'address' => fake()->address(),
        'avatar' => fake()->imageUrl(),
      ];
    }
  }
