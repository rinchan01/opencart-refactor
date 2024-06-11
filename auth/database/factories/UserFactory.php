<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    protected $model = User::class;
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'image' => fake()->imageUrl(),
            'code' => Str::random(40),
            'ip' => fake()->ipv4(),
            'status' => fake()->numberBetween(0, 1),
            'date_added' => fake()->dateTime(),
        ];
    }
}
