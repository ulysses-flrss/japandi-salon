@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">
<link rel="stylesheet" href="{{asset('css/modal-style.css')}}">

@endsection

@section('content')
<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida">
        
        <span id="bienvenida" title="Bienvenida">Gestionar Reservaciones<span>
    </div>

    <article class="mainArticle">
        <div class="button-container">

            <div class="table-button-container">
    
                <a class="table-select table-active" href="#" id="table1_button">
                    {{$reservacionesByUser[0]['nombres'] . ' ' . $reservacionesByUser[0]['apellidos']}}
                </a>
            </div>
            
        </div>
        <div class="table-responsive">
            <table class="table" id="table1">
                <thead>
                   <tr>
                        <th scope="col">ID Reservacion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Justificacion</th>
                        <th scope="col">Estado </th>
                    </tr>
        
                </thead>
                <tbody scope="row">    
                    @foreach ($reservacionesByUser as $reservacion)
                        
                        <tr>
                            <td>{{$reservacion['codReservacion']}}</td>
                            <td>{{$reservacion['fechaReservacion']}}</td>
                            <td>{{$reservacion['horaReservacion']}}</td>
                            <td>{{$reservacion['justificacion']}}</td>
                            <td>{{$reservacion['estado']}}</td>
                        </tr>
                    @endforeach
                 </tbody>
                </table>
            </div>
    </article>
    
    <script src="{{asset('js/modal.js')}}"></script>`
    <script src="{{asset('js/sweetalert.js')}}"></script>
    
@endsection

