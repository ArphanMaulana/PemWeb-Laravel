<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'genre_id' => Genre::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(3),
            'synopsis' => $this->faker->paragraph(),
            'poster' => $this->faker->imageUrl(),
            'year' => $this->faker->year(),
            'available' => $this->faker->boolean(),
        ];
    }
}
