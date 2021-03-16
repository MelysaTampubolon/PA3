<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');
            $table->dateTime('tanggal_transaksi');
            $table->double('harga');
            $table->integer('jumlah_produk');
            $table->unsignedBigInteger('toko_id');
            $table->foreign('toko_id')->references('id')->on('toko_online');
            $table->unsignedBigInteger('riwayat_id');
            $table->foreign('riwayat_id')->references('id')->on('riwayat_fetch_data');
            $table->string('status');
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
        Schema::dropIfExists('transaksi');
    }
}
