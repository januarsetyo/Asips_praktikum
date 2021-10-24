<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posyandu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posyandu', function (Blueprint $table) {
            $table->id();
            $table->string('nama posyandu');
            $table->string('alamat posyandu');
            $table->timestamps();
        });
        Schema::table('posyandu', function (Blueprint $table) {
            $table->foreignId('id_kelurahan')->constrained('kelurahan');
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
