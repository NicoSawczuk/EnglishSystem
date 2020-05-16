<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalabrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palabras', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('palabra');
            $table->string('pronunciacion')->nullable();
            $table->string('traduccion_espanol')->nullable();
            $table->string('ejemplo_ingles')->nullable();
            $table->string('traduccion_ejemplo')->nullable();
            $table->string('nota')->nullable();

            $table->unsignedBigInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('temas');

            $table->softDeletes();


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
        Schema::dropIfExists('palabras');
    }
}
