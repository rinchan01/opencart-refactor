<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->country(),
            'postcode_required' => 1,
            'iso_code_2' => fake()->countryCode(),
            'iso_code_3' => fake()->countryISOAlpha3(),
            'status' => 1
        ];
    }
}
