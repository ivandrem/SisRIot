<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiegosTable extends Migration
{
    public function up()
    {
        Schema::create('riegos', function (Blueprint $table) {
            $table->bigIncrements('id');       
            $table->string('nombre');
            $table->string('tipo');//foranea
            $table->string('descripcion');
            $table->integer('intervalo');
            $table->integer('tiempo');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riegos');
    }
}
