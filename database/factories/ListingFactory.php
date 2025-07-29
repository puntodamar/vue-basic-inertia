<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ListingFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds' => fake()->numberBetween(1,7),
            'baths' => fake()->numberBetween(1,7),
            'area' => fake()->numberBetween(1,7),
            'city' => fake()->city(),
            'code'=> fake()->postcode(),
            'street' => fake()->streetAddress(),
            'street_number' => fake()->numberBetween(10,200),
            'price' => fake()->numberBetween(50_000,2_000_000),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
