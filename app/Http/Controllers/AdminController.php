<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Reservacion;
use Illuminate\Database\Eloquent\Casts\Json;
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

        $reservaciones_del_dia = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')->where('estado', 'Pendiente')->whereDate('fechaReservacion', date('Y-m-d'))->get();

        return view('admin.index', compact('recepcionistas', 'clientes', 'reservaciones_pendientes', 'reservaciones_canjeadas', 'reservaciones_vencidas', 'administradores', 'reservaciones_del_dia'));  
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

    public function show($id) {
        $reservacion = Reservacion::find($id);
        $cliente = Usuario::find($reservacion->codCliente);
        return view('admin.reservaciones.show', compact('reservacion', 'cliente'));
    }

    public function getReservacionPorDia() {
        $reservaciones_del_dia = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')->where('estado', 'Pendiente')->whereDate('fechaReservacion', date('Y-m-d'))->get();
        return Json::encode($reservaciones_del_dia);
    }

}
