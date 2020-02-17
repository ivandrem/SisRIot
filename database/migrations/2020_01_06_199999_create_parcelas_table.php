<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->unsignedBigInteger('variedad');
            $table->foreign('variedad')->references('id')->on('plantas');
            $table->unsignedBigInteger('tipo');
            $table->foreign('tipo')->references('id')->on('riegos');
            $table->boolean('enabled')->default(true);
            $table->string('name');}
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
        Schema::dropIfExists('parcelas');
    }
}
