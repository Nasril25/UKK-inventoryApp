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
        Schema::create('tbl_mutasi_lokasi', function (Blueprint $table) {
            $table->increments('id_mutasi_lokasi');
            $table->unsignedInteger('id_lokasi');
            $table->unsignedInteger('id_pengadaan');
            $table->string('flag_lokasi', 45);
            $table->string('flag_pindah', 45);
            $table->timestamps();
        
            $table->foreign('id_lokasi')->references('id_lokasi')->on('tbl_lokasi')->onDelete('cascade');
            $table->foreign('id_pengadaan')->references('id_pengadaan')->on('tbl_pengadaan')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mutasi_lokasi');
    }
};
