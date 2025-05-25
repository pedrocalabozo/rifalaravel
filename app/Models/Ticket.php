<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'rifa_id',
        'user_id',
        'numeros_comprados',
        'cantidad_numeros',
        'metodo_pago',
        'estado_pago',
        'referencia_pago',
        'total_pagado'
    ];

    protected $casts = [
        'numeros_comprados' => 'array',
    ];

    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
