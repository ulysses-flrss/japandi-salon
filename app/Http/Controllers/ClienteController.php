<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Usuario::where('codRol', 3)->get();
        return view('shared.cliente-index', compact('clientes'));
    }

    public function list() {
        
    }
}
