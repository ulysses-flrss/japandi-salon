<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'regex:/^[0-9]{4}-[0-9]{4}$/',
            'dui' => 'regex:/^[0-9]{8}-[0-9]{1}$/|unique:usuarios,dui',
        ]);
        
        $usuario = new Usuario();
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->telefono = $request->telefono;
        $usuario->dui = $request->dui;
        $usuario->codRol = $request->codRol;
        $usuario->numReservaciones = 0;
        
        if($request->codRol == 2) {
            $request->validate([
                'correo' => 'required|email|unique:usuarios,correo',
                'password' => 'required|min:8',
            ]);
            $usuario->correo = $request->correo;
            $usuario->password = Hash::make($request->password);
            
        } else {
            $usuario->correo = NULL;
            $usuario->password = NULL;
        }
        
        $usuario->save();


        if (Auth::user()->codRol == 1) {
            return redirect()->route('admin.listUsuarios');
        } else {
            return redirect()->route('recepcionista.listClientes');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (Auth::user()->codRol == 2) {
            return view('recepcion.clientes.show', compact('usuario'));
        } else {
            return view('admin.usuarios.show', compact('usuario'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();

        if (Auth::user()->codRol == 3) {
            return redirect()->route('admin.listUsuarios');
        } else {
            return redirect()->route('recepcionista.listClientes');
        }
    }
}
