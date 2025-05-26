<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('festas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('rg');
            $table->string('cpf');
            $table->string('endereco');
            $table->string('cep');
            $table->string('celular');
            $table->date('data_festa');
            $table->string('horario'); // 13h ou 18h
            $table->string('pacote'); // semana ou fim de semana
            $table->decimal('valor', 8, 2);
            $table->string('status_pagamento')->default('pendente');
            $table->string('forma_pagamento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festas');
    }
};
