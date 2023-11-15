<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;
    protected $table = 'reservaciones';
    protected $primaryKey = 'codReservacion';
    public $incrementing = true;
    protected $fillable = [
        'codCliente',
        'fechaReservacion',
        'horaReservacion',
        'estado',
        'justificacion'

    ];
}
