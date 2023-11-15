@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">

@endsection

@section('content')
<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida2">
        <h1 id="bienvenida" title="Bienvenida">Gestionar Usuarios</b></h1>
    </div>

    <article class="mainArticle">


        <div class="button-container">

            <div class="table-button-container">
    
                <a class="table-select table-active" href="#" id="table1_button">
                    Recepcionistas
                </a>
                <br>
                
                <a href="#" class="table-select" id="table2_button">
                    Clientes
                </a>
            </div>
            <div class="" id="add-button">
                <a href="{{route('admin.usuario.create')}}">
                    <i class="fa-solid fa-circle-plus icon"></i>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" id="table1">
                <thead>
                   <tr>
                        <th scope="col">ID Recepcionista</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">DUI </th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
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
                            <td>
                                <a href="{{route('admin.usuario.show', ['id' => $recepcionista['codUsuario']])}}" title="Editar {{$recepcionista['codReservacion']}}">
                                    <i class="fa-solid fa-square-pen icon"></i>
                                </a>
                                <a href="{{route('usuario.destroy', ['id' => $recepcionista['codUsuario']])}}" title="Rechazar">
                                    <i class="fa-solid fa-square-xmark icon"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                 </tbody>
                </table>

                <div class="table-responsive">

                    <table class="table" id="table2" style="display: none">
                        <thead>
                           <tr>
                                <th scope="col">ID Cliente</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">DUI </th>
                                <th scope="col">N° Reservaciones</th>
                                <th scope="col">Acciones</th>

                                
                            </tr>
                
                        </thead>
                        <tbody scope="row">    
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente['codUsuario']}}</td>
                                    <td>{{$cliente['nombres']}}</td>
                                    <td>{{$cliente['apellidos']}}</td>
                                    <td>{{$cliente['telefono']}}</td>
                                    <td>{{$cliente['dui']}}</td>
                                    <td>{{$cliente['numReservaciones']}}</td>
                                    <td>
                                        <a href="{{route('admin.usuario.show', ['id' => $cliente['codUsuario']])}}" title="Editar {{$cliente['codUsuario']}}">
                                            <i class="fa-solid fa-square-pen icon"></i>
                                        </a>
                                        <a href="{{route('usuario.destroy', ['id' => $cliente['codUsuario']])}}" title="Eliminar">
                                            <i class="fa-solid fa-square-xmark icon"></i>
                                        </a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                         </tbody>
                        </table>
                </div>
            </div>
    </article>
@endsection

