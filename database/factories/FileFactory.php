<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => Str::random(4),
            //'correspondence_id' => $this->faker->numberBetween(1, 14),
            'correspondence_id' => 1,
            //change APP_URL in .env for port run by artisan eg 8000,
            'file_path' => url('/uploads/1.pdf'),
        ];
     
    }
}
