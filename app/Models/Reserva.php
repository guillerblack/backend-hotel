<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'cliente',
        'habitacion',
        'fecha_entrada',
        'fecha_salida',
    ];


}
