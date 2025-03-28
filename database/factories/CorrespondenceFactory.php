<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Correspondence>
 */
class CorrespondenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'code' => $this->faker->unique()->word, 
                'source' => $this->faker->city,
                'destination' => $this->faker->city,
                'object' => $this->faker->sentence, 
                'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
                'user_id' => 1, 
                'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            ];       
    }
}
