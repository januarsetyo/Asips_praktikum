<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('qty');
            $table->unsignedBigInteger('harga');
            $table->unsignedBigInteger('sub_total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_detail');
    }
}
