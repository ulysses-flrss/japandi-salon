@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">
@endsection

@section('content')
<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida2">
        <h1 id="bienvenida" title="Bienvenida">Ver Recepcionistas</b></h1>
    </div>

    <article class="mainArticle">
        <div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                   <tr>
                        <th scope="col">ID Recepcionista</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">DUI </th>
                        <th scope="col">Correo</th>
                    </tr>
        
                </thead>
                <tbody scope="row">    
                    @foreach ($recepcionistas as $recepcionista)
                        <tr>
                            <td>{{$recepcionista['codUsuario']}}</td>
                            <td>{{$recepcionista['nombres']}}</td>
                            <td>{{$recepcionista['apellidos']}}</td>
                            <td>{{$recepcionista['telefono']}}</td>
                            <td>{{$recepcionista['dui']}}</td>
                            <td>{{$recepcionista['correo']}}</td>
                        </tr>
                    @endforeach
                 </tbody>
                </table>
            </div>
    </article>
@endsection

