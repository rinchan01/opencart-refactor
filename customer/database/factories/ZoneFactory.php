<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => Country::factory(), // Assuming you have a CountryFactory
            'name' => $this->faker->name(),
            'code' => fake()->unique()->bothify('??###'), // Generates something like 'AB123'
            'status' => '1',
        ];
    }
}
