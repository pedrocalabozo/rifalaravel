<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaffleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('raffles')->insert([
            [
                'titulo' => 'Rifa de un Televisor 4K',
                'descripcion' => 'Participa para ganar un televisor 4K de última generación.',
                'foto_url' => 'https://example.com/images/tv-4k.jpg',
                'precio_boleto' => 10.00,
                'estado' => 'activa',
                'fecha_fin' => now()->addDays(30),
                'max_numeros' => 900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Rifa de un Smartphone',
                'descripcion' => 'Gana un smartphone de alta gama participando en nuestra rifa.',
                'foto_url' => 'https://example.com/images/smartphone.jpg',
                'precio_boleto' => 5.00,
                'estado' => 'activa',
                'fecha_fin' => now()->addDays(15),
                'max_numeros' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Rifa de una Bicicleta',
                'descripcion' => 'Participa y gana una bicicleta de montaña.',
                'foto_url' => 'https://example.com/images/bicicleta.jpg',
                'precio_boleto' => 3.00,
                'estado' => 'activa',
                'fecha_fin' => now()->addDays(10),
                'max_numeros' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}