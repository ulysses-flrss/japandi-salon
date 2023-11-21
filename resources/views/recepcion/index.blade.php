@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">
<link rel="stylesheet" href="{{asset('css/modal-style.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard-style.css')}}"> 

@endsection


@section('content')

<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida">
       
        <span id="bienvenida" title="Bienvenida">Bienvenido/a {{Auth::user()->nombres}}</b><span>
    </div>

    <article class="mainArticle">
        
        {{-- <canvas id="myChart"></canvas> --}}
       
        
       
        
        <div class="dashboard-item-container" id="">
            <h1 class="dashboard-title">Clientes</h1>
            <p class="dashboard-content">{{$num_clientes}}</p>
        </div>

        <div class="dashboard-item-container" id="">
            <h1 class="dashboard-title">Reservaciones Pendientes</h1>
            <p class="dashboard-content">{{$reservaciones_pendientes}}</p>
        </div>

        <div class="dashboard-item-container" id="">
            <h1 class="dashboard-title">Reservaciones Canjeadas</h1>
            <p class="dashboard-content">{{$reservaciones_canjeadas}}</p>
        </div>

        <div class="dashboard-item-container" id="">
            <h1 class="dashboard-title">Reservaciones Vencidas</h1>
            <p class="dashboard-content">{{$reservaciones_vencidas}}</p>
        </div>
        <div>

            <h1 style="text-align: center; margin: 30px 0; font-family: var(--menuFont)">Reservaciones del {{date('d/M/Y')}}</h1>
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
                    <tbody id="table1_body" scope="row">    
                        @foreach ($reservaciones_del_dia as $reservacion)
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
                        @endforeach
                     </tbody>
                    </table>
            </div>
        </div>
        

    </article>
    <script>
        axios.get("/admin/reservacionesPorDia")
        .then(res => {
            console.log(res);
            if (res.data ==0) {
                document.getElementById('table1_body').innerHTML = "<td></td><td></td><td></td><td>No hay reservaciones para hoy</td>"
            }
        })
        .catch(err => {
            console.error(err); 
        })
    </script>
@endsection

