<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    public function run()
    {
        // Example data for tickets
        $tickets = [
            [
                'id_rifa' => 1,
                'id_usuario' => 1,
                'numeros_comprados' => json_encode([101, 102, 103]),
                'cantidad_numeros' => 3,
                'metodo_pago' => 'Pago Movil',
                'estado_pago' => 'pagado',
                'fecha_compra' => now(),
            ],
            [
                'id_rifa' => 2,
                'id_usuario' => 2,
                'numeros_comprados' => json_encode([201, 202]),
                'cantidad_numeros' => 2,
                'metodo_pago' => 'Criptomoneda',
                'estado_pago' => 'verificado',
                'fecha_compra' => now(),
            ],
            [
                'id_rifa' => 1,
                'id_usuario' => 3,
                'numeros_comprados' => json_encode([301]),
                'cantidad_numeros' => 1,
                'metodo_pago' => 'Zinli',
                'estado_pago' => 'pendiente',
                'fecha_compra' => now(),
            ],
        ];

        DB::table('boletos')->insert($tickets);
    }
}