<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Casts\Json;

class RecepcionistaController extends Controller
{
    public function index() {
        $administradores = Usuario::where('codRol', 1)->count();
        $recepcionistas = Usuario::where('codRol', 2)->count(); 
        $num_clientes = Usuario::where('codRol', 3)->count();
        $clientes = Usuario::where('codRol', 3)->get();
        $reservaciones_pendientes = Reservacion::where('estado', 'Pendiente')->count();
        $reservaciones_vencidas = Reservacion::where('estado', 'Vencida')->count();
        $reservaciones_canjeadas = Reservacion::where('estado', 'Canjeado')->count();
        
        
        $reservaciones_del_dia = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')->where('estado', 'Pendiente')->whereDate('fechaReservacion', date('Y-m-d'))->get();

        return view('recepcion.index', compact('recepcionistas', 'clientes', 'num_clientes','reservaciones_pendientes', 'reservaciones_canjeadas', 'reservaciones_vencidas', 'administradores', 'reservaciones_del_dia'));  
    }

    public function listClientes () {
        $clientes = Usuario::where('codRol', 3)->get();
        
        return view('recepcion.clientes.list', compact('clientes'));
    }

    public function listReservaciones (){
        $reservaciones = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')
            ->select('*')   
            ->get();
            $clientes = Usuario::where('codRol', 3)->get();

        return view('recepcion.reservaciones.list', compact('reservaciones', 'clientes'));
    }

    public function listCanjeadas () {
        $reservaciones = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')
            ->select('*')
            ->where('estado', 'Canjeado')
            ->get();
            $clientes = Usuario::where('codRol', 3)->get();

        return view('recepcion.reservaciones.listCanjeadas', compact('reservaciones', 'clientes'));
    }


    public function show($id) {
        $reservacion = Reservacion::find($id);
        $cliente = Usuario::find($reservacion->codCliente);
        return view('recepcion.reservaciones.show', compact('reservacion', 'cliente'));
    }

    public function show_cliente($id) {
        $usuario = Usuario::find($id);
        return view('recepcion.clientes.show', compact('usuario'));
    }   

    public function create() {
        return view('recepcion.clientes.create');
    }

    public function getReservacionPorDia() {
        $reservaciones_del_dia = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')->where('estado', 'Pendiente')->whereDate('fechaReservacion', date('Y-m-d'))->get();
        return Json::encode($reservaciones_del_dia);
    }

}
