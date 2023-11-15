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
                <a href="{{route('admin.usuario.create')}}">
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
                                        {{$cliente['numReservaciones']}}
                                        
                                    </td>
                                    
                                    
                                </tr>
                            @endforeach
                         </tbody>
                        </table>
                </div>
            </div>
    </article>
@endsection

