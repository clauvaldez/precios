<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratistasTable extends Migration
{
    public function up()
    {
        Schema::create('contratistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('contacto');
            $table->text('datos_adicionales')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contratistas');
    }
}
