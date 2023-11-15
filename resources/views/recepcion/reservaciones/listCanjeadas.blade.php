@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">
<link rel="stylesheet" href="{{asset('css/modal-style.css')}}">

@endsection

@section('content')
@include('recepcion.reservaciones.create')
<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida">
        
        <span id="bienvenida" title="Bienvenida">Listar Reservaciones Canjeadas<span>
    </div>

    <article class="mainArticle">
        <div class="table-responsive">
            <table class="table">
                <thead>
                   <tr>
                        <th scope="col">ID Reservacion</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Justificacion</th>
                        <th scope="col">Estado </th>
                        <th scope="col">Fecha de Canje</th>
                    </tr>
        
                </thead>
                <tbody scope="row">    
                    
                    @foreach ($reservaciones as $reservacion)
                        <tr>
                            <td>{{$reservacion['codReservacion']}}</td>
                            <td>{{$reservacion['nombres'] . ' ' . $reservacion['apellidos']}}</td>
                            <td>{{$reservacion['fechaReservacion']}}</td>
                            <td>{{$reservacion['horaReservacion']}}</td>
                            <td>{{$reservacion['justificacion']}}</td>
                            <td>{{$reservacion['estado']}}</td>
                            <td>{{$reservacion['updated_at']}}</td>
                        </tr>
                    @endforeach
                 </tbody>
                </table>
            </div>
    </article>
    <script src="{{asset('js/modal.js')}}"></script>
@endsection

