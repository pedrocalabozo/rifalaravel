<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // Clave primaria automática
            $table->foreignId('rifa_id')->constrained('rifas')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->json('numeros_comprados');
            $table->integer('cantidad_numeros');
            $table->string('metodo_pago');
            $table->string('estado_pago')->default('pendiente');
            $table->string('referencia_pago')->nullable();
            //total pagado
            $table->decimal('total_pagado', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
