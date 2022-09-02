<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('idescuela')->nullable();
            $table->string('nombre')->required();
            $table->string('apellido1')->required();
            $table->string('apellido2');
            $table->string('curp')->required()->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('registroescolar')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('estudiantes');
    }
}
