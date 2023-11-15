<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->codRol == 1) {
                
                return redirect()->route('admin.index');
            } else if (Auth::user()->codRol == 2){
                
                return redirect()->route('recepcionista.index');
            }
        } else {
            return view('index');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        
        // $credentials = $request->validate([
        //     'correo' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        $credentials = $request->only('correo', 'password');



        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $nombres = explode(" ", Auth::user()->nombres);
            $apellidos = explode(" ", Auth::user()->apellidos);

            $nombre_apellido = $nombres[0]." ".$apellidos[0];
            session(['nombre_apellido' => $nombre_apellido]);
            if (Auth::user()->codRol == 1) {
                // Alert::success('Bienvenido', 'Administrador');
                // return redirect()->route('admin.index');
                return Response()->json(Auth::user());
            } else if (Auth::user()->codRol == 2) {
                // Alert::success('Bienvenido', 'Recepcionista');
                // return redirect()->route('recepcionista.index');
                return Response()->json(Auth::user());
            }
            
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login.index');
    }
}
