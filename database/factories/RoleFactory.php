<?php

  namespace Database\Factories;

  use App\Models\Role;
  use Illuminate\Database\Eloquent\Factories\Factory;
  use Illuminate\Support\Str;

  /**
   * @extends Factory<Role>
   */
  class RoleFactory extends Factory
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
        'name' => $this->faker->unique()->randomElement(['Admin', 'Reviewer']),
      ];
    }
  }
