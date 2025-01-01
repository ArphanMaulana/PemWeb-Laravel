<?php

namespace Database\Factories;

use App\Models\Cast;
use Illuminate\Database\Eloquent\Factories\Factory;

class CastFactory extends Factory
{
  protected $model = Cast::class;

  public function definition(): array
  {
    return [
      'name' => $this->faker->name(),
      'age' => $this->faker->numberBetween(18, 60),
      'biodata' => $this->faker->paragraph(),
    ];
  }
}
