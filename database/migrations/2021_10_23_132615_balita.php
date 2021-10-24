<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Balita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->string('nama balita');
            $table->string('nik orang tua');
            $table->string('nama orang tua');
            $table->string('tgl lahir balita');
            $table->string('jenis kelamin balita');
            $table->timestamps();
        });
        Schema::table('balita', function (Blueprint $table) {
            $table->foreignId('id_posyandu')->constrained('posyandu');
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
