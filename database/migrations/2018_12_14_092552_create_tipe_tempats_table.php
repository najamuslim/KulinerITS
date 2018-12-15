<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipeTempatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_tempats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tempat');
            $table->unsignedInteger('id_tipe');
            $table->timestamps();
            $table->foreign('id_tempat')->references('id')->on('tempat_makans');
            $table->foreign('id_tipe')->references('id')->on('tipe_makanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_tempats');
    }
}
