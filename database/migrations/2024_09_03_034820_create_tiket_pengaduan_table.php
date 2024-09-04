<?php

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tiket_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('ticket')->unique()->default('');
            $table->text('body');
            $table->string('lampiran')->nullable();
            $table->date('tgl_awal')->default(Date::now());
            $table->date('tgl_akhir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket_pengaduans');
    }
};
