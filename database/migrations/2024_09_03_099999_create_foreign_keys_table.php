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

        Schema::table('tiket_pengaduan', function (Blueprint $table) {
            $table->foreignId('pengadu_id')->constrained(table: 'pengadu');
            $table->foreignId('kategori_id')->constrained(table: 'kategori');
        });

        Schema::table('tanggapan', function (Blueprint $table) {
            $table->foreignId('tiket_pengaduan_id')->unique()->constrained(table: 'tiket_pengaduan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        // Schema::table('tiket_pengaduan', function (Blueprint $table) {
        //     $table->dropColumn('pengadu_id');
        //     $table->dropColumn('kategori_id');
        // });

        // Schema::table('tanggapan', function (Blueprint $table) {
        //     $table->dropColumn('tiket_pengaduan_id');
        // });
    }
};
