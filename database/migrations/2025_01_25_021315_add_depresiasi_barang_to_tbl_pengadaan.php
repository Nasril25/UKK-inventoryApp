<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('tbl_pengadaan', function (Blueprint $table) {
        $table->decimal('depresiasi_barang', 10, 2)->after('harga_barang');
    });
}

public function down()
{
    Schema::table('tbl_pengadaan', function (Blueprint $table) {
        $table->dropColumn('depresiasi_barang');
    });
}

};
