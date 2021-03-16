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
            $table->unsignedBigInteger('riwayat_id');
            $table->foreign('riwayat_id')->references('id')->on('riwayat_fetch_data');
            $table->string('url_produk');
            $table->string('nama_produk');
            $table->integer('stok');
            $table->double('harga');
            $table->longText('gambar');
            $table->string('kode_produk');
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
