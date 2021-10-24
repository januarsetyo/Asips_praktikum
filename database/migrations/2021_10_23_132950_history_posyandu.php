<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoryPosyandu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_posyandu', function (Blueprint $table) {
            $table->id();
            $table->string('tgl posyandu');
            $table->string('berat badan balita');
            $table->string('tinggi badan');
            $table->timestamps();
        });
        Schema::table('history_posyandu', function (Blueprint $table) {
            $table->foreignId('id_balita')->constrained('balita');
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
