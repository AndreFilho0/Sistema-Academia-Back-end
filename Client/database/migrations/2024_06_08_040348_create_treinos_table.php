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
            $table->string('segunda-feira')->nullable();
            $table->string('terca-feira')->nullable();
            $table->string('quarta-feira')->nullable();
            $table->string('quinta-feira')->nullable();
            $table->string('sexta-feira')->nullable();
            $table->string('sabado')->nullable();
            $table->string('domingo')->nullable();
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
