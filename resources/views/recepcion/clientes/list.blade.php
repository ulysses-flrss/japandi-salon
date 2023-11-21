@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">

@endsection

@section('content')
<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida2">
        <h1 id="bienvenida" title="Bienvenida">Gestionar Clientes</b></h1>
    </div>

    <article class="mainArticle">


        <div class="button-container">

            <div class="table-button-container">
                <a href="#" class="table-select" id="table2_button">
                    Clientes
                </a>
            </div>
            <div class="" id="add-button">
                <a href="{{route('recepcionista.usuario.create')}}">
                    <i class="fa-solid fa-circle-plus icon"></i>
                </a>
            </div>
        </div>
                <div class="table-responsive">

                    <table class="table" id="table1">
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
                                    <td>
                                        <a href="{{route('reservacion.listByUser', ['id' => $cliente['codUsuario']])}}">
                                            {{$cliente['numReservaciones']}}
                                        </a>
                                        
                                    </td>
                                    <td>
                                        <a href="{{route('recepcionista.cliente.show', ['id' => $cliente['codUsuario']])}}" title="Editar {{$cliente['codCliente']}}">
                                            <i class="fa-solid fa-square-pen icon"></i>
                                        </a>
                                        <a href="#" title="Eliminar" class="delete_user_button">
                                            <i class="fa-solid fa-square-xmark icon" data-user="{{$cliente}}"></i>
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

