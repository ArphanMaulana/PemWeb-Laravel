<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'biodata' => $this->faker->paragraph(),
            'age' => $this->faker->numberBetween(18, 80),
            'address' => $this->faker->address(),
            'avatar' => $this->faker->imageUrl(),
        ];
    }
}
