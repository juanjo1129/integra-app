<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Generar un usuario de pruebas; usuario: 1, contraseña: password
        \App\Models\User::factory()->create([
            'user' => 1,
        ]);
    }
}
