<?php

namespace Database\Factories;

use App\Models\TiketPengaduan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tanggapan>
 */
class TanggapanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $status = ['Pending', 'Proses', 'Ditolak', 'Selesai'];
        static $tiketId = 1;

        return [
            "tanggapan" => fake()->sentence(),
            "status" => fake()->randomElement($status),
            "lampiran" => fake()->url(),
            "tiket_pengaduan_id" => $tiketId++,
        ];
    }
}
