@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">
<link rel="stylesheet" href="{{asset('css/modal-style.css')}}">

@endsection
@include('admin.reservaciones.create')
@section('content')
<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida2">
        <h1 id="bienvenida" title="Bienvenida">Gestionar Reservaciones</b></h1>
    </div>

    <article class="mainArticle">
        <div class="button-container">

            <div class="table-button-container">
    
                <a class="table-select table-active" href="#" id="table1_button">
                    Pendientes
                </a>
                <br>
                
                <a href="#" class="table-select" id="table2_button">
                    Canjeadas
                </a>
    
                <a href="#" class="table-select" id="table3_button">
                    Vencidas
                </a>
                <a href="#" class="table-select" id="table4_button">
                    Canceladas
                </a>
            </div>
            <div class="" id="add-button">
                <a href="#" id="openModal">
                    <i class="fa-solid fa-circle-plus icon"></i>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" id="table1">
                <thead>
                   <tr>
                        <th scope="col">ID Reservación</th>
                        <th scope="col">Nombre Cliente</th>
                        <th scope="col">Fecha Reservación</th>
                        <th scope="col">Hora Reservación</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Justificación</th>
                        <th scope="col">Acciones</th>
                    </tr>
        
                </thead>
                <tbody scope="row">    
                    
                    @foreach ($reservaciones as $reservacion)
                        @if ($reservacion->estado == "Pendiente")
                            <tr>
                                <td>{{$reservacion['codReservacion']}}</td>
                                <td>{{$reservacion['nombres']. " " .$reservacion['apellidos']}}</td>
                                <td>{{$reservacion['fechaReservacion']}}</td>
                                <td>{{$reservacion['horaReservacion']}}</td>
                                <td>{{$reservacion['estado']}}</td>
                                <td>{{$reservacion['justificacion']}}</td>
                                <td>
                                    <a href="{{route('admin.reservacion.show', ['id' => $reservacion['codReservacion']])}}" title="Editar {{$reservacion['codReservacion']}}">
                                        <i class="fa-solid fa-square-pen icon"></i>
                                    </a>
                                    <a href="{{route('reservacion.approve', ['id' => $reservacion['codReservacion']])}}" title="Aprobar">
                                        <i class="fa-solid fa-square-check icon"></i>
                                    </a>
                                    <a href="#" class="cancel_button" title="Cancelar">
                                        <i class="fa-solid fa-square-xmark icon" data-reservacion="{{$reservacion}}"></i>
                                    </a>
                                </td>
                            </tr>                    
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

            <div class="table-responsive">
                <table class="table" id="table2" style="display: none">
                    <thead>
                        <tr>
                            <th scope="col">ID Reservación</th>
                            <th scope="col">Nombre Cliente</th>
                            <th scope="col">Fecha Reservación</th>
                            <th scope="col">Hora Reservación</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Justificación</th>
                        </tr>
            
                    </thead>
                    <tbody scope="row">    
                        
                        @foreach ($reservaciones as $reservacion)
                            @if ($reservacion->estado == "Canjeado")
                                <tr>
                                    <td>{{$reservacion['codReservacion']}}</td>
                                    <td>{{$reservacion['nombres']. " " .$reservacion['apellidos']}}</td>
                                    <td>{{$reservacion['fechaReservacion']}}</td>
                                    <td>{{$reservacion['horaReservacion']}}</td>
                                    <td>{{$reservacion['estado']}}</td>
                                    <td>{{$reservacion['justificacion']}}</td>
                                </tr>                    
                        @endif
                        @endforeach
                     </tbody>
                    </table>
            </div>

            <div class="table-responsive">
                <table class="table" id="table3" style="display: none">
                    <thead>
                        <tr>
                            <th scope="col">ID Reservación</th>
                            <th scope="col">Nombre Cliente</th>
                            <th scope="col">Fecha Reservación</th>
                            <th scope="col">Hora Reservación</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Justificación</th>
                            

                        </tr>
            
                    </thead>
                    <tbody scope="row">    
                        
                        @foreach ($reservaciones as $reservacion)

                            @if ($reservacion->estado == "Vencida")
                                <tr>
                                    <td>{{$reservacion['codReservacion']}}</td>
                                    <td>{{$reservacion['nombres']. " " .$reservacion['apellidos']}}</td>
                                    <td>{{$reservacion['fechaReservacion']}}</td>
                                    <td>{{$reservacion['horaReservacion']}}</td>
                                    <td>{{$reservacion['estado']}}</td>
                                    <td>{{$reservacion['justificacion']}}</td>
                                    
                                </tr>                    
                            @endif
                        @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="table-responsive">
                <table class="table" id="table4"  style="display: none">
                    <thead>
                       <tr>
                            <th scope="col">ID Reservación</th>
                            <th scope="col">Nombre Cliente</th>
                            <th scope="col">Fecha Reservación</th>
                            <th scope="col">Hora Reservación</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Justificación</th>
                            
                        </tr>
            
                    </thead>
                    <tbody scope="row">    
                        
                        @foreach ($reservaciones as $reservacion)
                            @if ($reservacion->estado == "Cancelada")
                                <tr>
                                    <td>{{$reservacion['codReservacion']}}</td>
                                    <td>{{$reservacion['nombres']. " " .$reservacion['apellidos']}}</td>
                                    <td>{{$reservacion['fechaReservacion']}}</td>
                                    <td>{{$reservacion['horaReservacion']}}</td>
                                    <td>{{$reservacion['estado']}}</td>
                                    <td>{{$reservacion['justificacion']}}</td>
                                   
                                </tr>                    
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
    </article>
    <script src="{{asset('js/modal.js')}}"></script>
    @if ($errors->any())
        <script>
            document.querySelector('.allContainer').style.filter = 'blur(3px)'
            document.querySelector('.barNav').style.filter = 'blur(3px)'
            document.getElementById('miModal').style.display = 'block';
        </script>
    @endif
@endsection

