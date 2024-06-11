<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected static string $password;
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'email' => fake()->unique()->email(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'store_id' => '1',
            'customer_group_id' => '1',
            'language_id' => '1',
            'telephone' => fake()->unique()->phoneNumber(),
            'password' => static::$password ??= Hash::make('password'),
            'status' => '1',
            'ip' => fake()->ipv4(),
            'newsletter' => '1',
            'date_added' =>fake()->dateTime(),
        ];
    }
}
