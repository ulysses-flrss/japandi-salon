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

        

    </article>
    <script src="{{asset('js/modal.js')}}"></script>
@endsection

