<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    use HasFactory;

    protected $table = 'rifas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'foto_url',
        'data_ai_hint',
        'precio_boleto',
        'estado',
        'fecha_fin',
        'max_numeros',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'rifa_id');
    }

    public function winners()
    {
        return $this->hasMany(Winner::class, 'id_rifa');
    }
}
