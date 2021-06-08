<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('riwayat_id');
//            $table->foreign('riwayat_id')->references('id')->on('riwayat_fetch_data');
            $table->string('kategoriToped');
            $table->string('kategoriShopee');
            $table->string('kategoriBukaLapak');
            $table->string('kode_produk');
            $table->string('url_produk');
            $table->string('nama_produk');
            $table->integer('stok');
            $table->double('harga');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->integer('berat');
            $table->integer('waktuPreorder');
            $table->string('asuransi');
            $table->string('dummyColumn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
