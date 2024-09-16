<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tiket_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('ticket')->unique();
            $table->text('body')->default('');
            $table->string('lampiran')->nullable();
            $table->date('tgl_awal')->default(now());
            $table->date('tgl_akhir')->nullable();
            $table->unsignedBigInteger('pengadu_id');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('pengadu_id')->references('id')->on('pengadu')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('tiket_pengaduan', function (Blueprint $table) {
        $table->dropForeign(['pengadu_id']);
        $table->dropForeign(['kategori_id']);
        $table->string('ticket')->nullable()->change();
    });

    Schema::dropIfExists('tiket_pengaduan');
}
};
