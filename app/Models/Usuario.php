<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'codUsuario';
    public $incrementing = true;
    protected $fillable = [
        'nombres',
        'apellidos',
        'codRol',
        'telefono',
        'dui',
        'correo',
        'password',
        'numReservaciones'
    ];

}
