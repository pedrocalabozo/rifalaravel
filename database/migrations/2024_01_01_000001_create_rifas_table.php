<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifas', function (Blueprint $table) {

            $table->id(); // Clave primaria
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('foto_url')->nullable();
            $table->string('data_ai_hint', 100)->nullable();
            $table->decimal('precio_boleto', 10, 2);
            $table->string('estado')->default('activa');
            $table->dateTime('fecha_fin')->nullable();
            $table->integer('max_numeros')->default(900);
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
        Schema::dropIfExists('raffles');
    }
}
