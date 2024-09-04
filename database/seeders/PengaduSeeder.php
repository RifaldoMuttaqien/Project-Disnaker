<?php

namespace Database\Seeders;

use App\Models\Pengadu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengaduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pengadu::factory(7)->create();
    }
}
