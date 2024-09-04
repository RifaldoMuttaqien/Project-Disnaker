<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengadu>
 */
class PengaduFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "nik" => fake()->unique()->numberBetween(1000000, 9999999),
            "name" => fake()->name(),
            "no_wa" => fake()->unique()->phoneNumber(),
        ];
    }
}
