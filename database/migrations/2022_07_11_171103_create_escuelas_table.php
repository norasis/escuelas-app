<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Eloquent\SoftDeletes;

class CreateEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
           
            $table->string('nombre')->required();
            $table->string('claveregistro')->required();
            $table->string('direccion')->required();
            $table->string('nivel')->required();  
            $table->softdeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escuelas');
    }
}
