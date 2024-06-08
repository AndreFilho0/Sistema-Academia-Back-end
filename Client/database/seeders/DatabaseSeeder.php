<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Planos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $planos = [
            [ "nome"=>"mensal","valor"=>"89.99"],
             ["nome"=>"trimestral","valor"=>"249.99"],
             ["nome"=>"semestral","valor"=>"499.99"],
             ["nome"=>"anual","valor"=>"989.99"],
        ];

         foreach ($planos as $plano) {
            Planos::create($plano);
        }

    }
}
