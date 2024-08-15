<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FlowerTTransaksiPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transaksi_bunga', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('tipe_pembayaran');
            $table->string('tanggal_pembayaran');
            $table->foreignId('bunga_id')->constrained('bunga');
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
        //
    }
}
