<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservaciones = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')
            ->select('*')
            ->get();
        $clientes = Usuario::where('codRol', 3)->get();
        return view('shared.reservacion-index', compact('reservaciones', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shared.create-reservation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'codCliente' => 'required|not_in:0',
            'fecha' => 'required|date|after_or_equal:today',
            'justificacion' => 'required|min:1',
        ]);   

        $reservacion = new Reservacion();
        $reservacion->codCliente = $request->codCliente;
        $reservacion->fechaReservacion = $request->fecha;
        $reservacion->horaReservacion = $request->hora;
        $reservacion->estado = 'Pendiente';
        $reservacion->justificacion = $request->justificacion;
        $reservacion->save();

        if (Auth::user()->codRol == 2) {
            return redirect()->route('recepcionista.listReservaciones');
        } else if (Auth::user()->codRol == 1) { 
            return redirect()->route('admin.listReservaciones');
        } else {
            return redirect()->route('login.index');
        }

        
    }

    public function approve ($id) {

        $reservacion = Reservacion::find($id);
        $reservacion->estado = 'Canjeado';
        $reservacion->save();

        if (Auth::user()->codRol == 2) {
            return redirect()->route('recepcionista.listReservaciones');
        } else if (Auth::user()->codRol == 1) { 
            return redirect()->route('admin.listReservaciones');
        } else {
            return redirect()->route('login.index');
        }
    }

    public function deny ($id) {
        $reservacion = Reservacion::find($id);
        $reservacion->estado = 'Cancelada';
        $reservacion->save();

        return Response()->json(Auth::user()); 

    }


    public function listByUser ($idCliente) {
        $reservacionesByUser = Reservacion::join('usuarios', 'reservaciones.codCliente', '=', 'usuarios.codUsuario')
            ->select('*')
            ->where('codCliente', $idCliente)
            ->orderBy('fechaReservacion', 'asc')
            ->get();

        return view('shared.reservacion-list-by-user', compact('reservacionesByUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservacion = Reservacion::find($id);
        $reservacion->fechaReservacion = $request->fecha;
        $reservacion->horaReservacion = $request->hora;
        $reservacion->justificacion = $request->justificacion;
        $reservacion->save();

        if (Auth::user()->codRol == 2) {
            return redirect()->route('recepcionista.listReservaciones');
        } else if (Auth::user()->codRol == 1) { 
            return redirect()->route('admin.listReservaciones');
        } else {
            return redirect()->route('login.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservacion $reservacion)
    {
        //
    }
}
