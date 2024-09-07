<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
        $table->id();
        $table->string('nik');
        $table->string('nama');
        $table->string('foto');
        $table->date('tgl');
        $table->integer('kategori_id');
        $table->integer('pengaduan_id')->nullable(); // Jika pengaduan_id opsional
        $table->text('body');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
