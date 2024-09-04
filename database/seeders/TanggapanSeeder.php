<?php

namespace Database\Seeders;

use App\Models\Tanggapan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TanggapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tanggapan::factory(10)->create();
    }
}
