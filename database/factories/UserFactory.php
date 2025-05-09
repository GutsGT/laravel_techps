<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => Hash::make('password'),
            'city_id' => City::get()->where('name', '=', 'Natal')->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static{
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
