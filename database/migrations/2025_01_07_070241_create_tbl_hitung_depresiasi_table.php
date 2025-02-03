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
        Schema::create('tbl_hitung_depresiasi', function (Blueprint $table) {
            $table->increments('id_hitung_depresiasi');
            $table->unsignedInteger('id_pengadaan');
            $table->date('tgl_hitung_depresiasi');
            $table->string('bulan', 10);
            $table->integer('durasi');
            $table->integer('nilai_barang');
            $table->timestamps();
        
            $table->foreign('id_pengadaan')->references('id_pengadaan')->on('tbl_pengadaan')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hitung_depresiasi');
    }
};
