<?php

namespace Database\Seeders;

use App\Models\TiketPengaduan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TiketPengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TiketPengaduan::factory(10)->create();
    }
}
