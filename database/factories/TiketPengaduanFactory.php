<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Pengadu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TiketPengaduan>
 */
class TiketPengaduanFactory extends Factory
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
            "ticket"=> fake()->uuid(),
            "body" => fake()->sentence(),
            "lampiran" => fake()->imageUrl(),
            "pengadu_id" => Pengadu::inRandomOrder()->first()->id,
            "kategori_id" => Kategori::inRandomOrder()->first()->id,
        ];
    }
}
