<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kategori = ['Pengaduan Layanan', 'Pengaduan Kerusakan', 'Pengaduan Kehilangan', 'Pengaduan Sarana Prasarana', 'Kritik dan Saran'];

        foreach ($kategori as $data) {
            Kategori::create(['kategori' => $data]);
        }
    }
}
