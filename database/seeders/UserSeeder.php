<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'google_id' => '1234567890',
            'email' => 'user1@example.com',
            'nombre' => 'User One',
            'apellido' => 'One',
            'telefono' => '1234567890',
            'numero_id' => 'V-12345678',
            'imagen_perfil' => 'https://example.com/user1.jpg',
        ]);

        User::create([
            'google_id' => '0987654321',
            'email' => 'user2@example.com',
            'nombre' => 'User Two',
            'apellido' => 'Two',
            'telefono' => '0987654321',
            'numero_id' => 'V-87654321',
            'imagen_perfil' => 'https://example.com/user2.jpg',
        ]);

        // Add more users as needed
    }
}