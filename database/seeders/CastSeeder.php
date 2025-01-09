<?php

namespace Database\Seeders;

use App\Models\Cast;
use Illuminate\Database\Seeder;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cast::factory(4)->create();
    }
}
