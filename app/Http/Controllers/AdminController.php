<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index()
    {
        $administradores = Usuario::where('codRol', 1)->count();
        $recepcionistas = Usuario::where('codRol', 2)->count(); 
        $clientes = Usuario::where('codRol', 3)->count();
        $reservaciones_pendientes = Reservacion::where('estado', 'Pendiente')->count();
        $reservaciones_vencidas = Reservacion::where('estado', 'Vencida')->count();
        $reservaciones_canjeadas = Reservacion::where('estado', 'Canjeado')->count();

        return view('admin.index', compact('recepcionistas', 'clientes', 'reservaciones_pendientes', 'reservaciones_canjeadas', 'reservaciones_vencidas', 'administradores'));  
    }

    public function listUsuarios() {
        $recepcionistas = Usuario::where('codRol', 2)->get();
        $clientes = Usuario::where('codRol', 3)->get();

        return view('admin.usuarios.list', compact('recepcionistas', 'clientes'));
    }

    public function listReservaciones () {
        $reservaciones = Reservacion::select("*")->join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')->get();
        $clientes = Usuario::where('codRol', 3)->get();

        return view('admin.reservaciones.list', compact('reservaciones', 'clientes'));
    }

    public function create_usuario () {
        return view('admin.usuarios.create');
    }
}
