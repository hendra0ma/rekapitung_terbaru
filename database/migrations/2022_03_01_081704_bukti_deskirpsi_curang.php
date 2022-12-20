<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuktiDeskirpsiCurang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_deskripsi_curang', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('text')->nullable();
            $table->integer('tps_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_deskripsi_curang');
    }
}
