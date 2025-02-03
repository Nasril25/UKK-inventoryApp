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
        Schema::create('tbl_pengadaan', function (Blueprint $table) {
            $table->increments('id_pengadaan');
            $table->unsignedInteger('id_master_barang');
            $table->unsignedInteger('id_depresiasi');
            $table->unsignedInteger('id_merk');
            $table->unsignedInteger('id_satuan');
            $table->unsignedInteger('id_sub_kategori_asset');
            $table->unsignedInteger('id_distributor');
            $table->string('kode_pengadaan', 20);
            $table->string('no_invoice', 20);
            $table->string('no_seri_barang', 50);
            $table->string('tahun_produksi', 5);
            $table->date('tgl_pengadaan');
            $table->integer('harga_barang');
            $table->integer('nilai_barang');
            $table->enum('fb', ['0', '1'])->default('0');
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        
            $table->foreign('id_master_barang')->references('id_barang')->on('tbl_master_barang')->onDelete('cascade');
            $table->foreign('id_depresiasi')->references('id_depresiasi')->on('tbl_depresiasi')->onDelete('cascade');
            $table->foreign('id_merk')->references('id_merk')->on('tbl_merk')->onDelete('cascade');
            $table->foreign('id_satuan')->references('id_satuan')->on('tbl_satuan')->onDelete('cascade');
            $table->foreign('id_sub_kategori_asset')->references('id_sub_kategori_asset')->on('tbl_sub_kategori_asset')->onDelete('cascade');
            $table->foreign('id_distributor')->references('id_distributor')->on('tbl_distributor')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pengadaan');
    }
};
