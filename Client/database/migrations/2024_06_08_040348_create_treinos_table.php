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
        Schema::dropIfExists('treinos');
        Schema::create('treinos', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCliente');
            $table->longText('segunda-feira')->nullable();
            $table->longText('terca-feira')->nullable();
            $table->longText('quarta-feira')->nullable();
            $table->longText('quinta-feira')->nullable();
            $table->longText('sexta-feira')->nullable();
            $table->longText('sabado')->nullable();
            $table->longText('domingo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treinos');
    }
};
