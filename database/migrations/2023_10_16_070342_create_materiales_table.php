<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('materiales', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('unidad_medida');
        $table->decimal('precio_referencial', 8, 2);
        $table->date('fecha_ultima_modificacion');
        $table->string('imagen')->nullable(); // Opcional: permite valores nulos para la columna imagen
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
        Schema::dropIfExists('materiales');
    }
};
