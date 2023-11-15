


@extends('layouts.template')

@section('head')
    <link rel="stylesheet" href="{{asset('css/index-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/tabla.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard-style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')

<main class="allContainer">

    <div class="bienvenida" id="container-bienvenida">
       
        <span id="bienvenida" title="Bienvenida">Bienvenido {{session('nombre_apellido')}}</b><span>
    </div>

    <article class="mainArticle">
        
        {{-- <canvas id="myChart"></canvas> --}}
        
        <div class="dashboard-item-container" id="">
            <h1 class="dashboard-title">Administradores</h1>
            <p class="dashboard-content">{{$administradores}}</p>
        </div>
        
        <div class="dashboard-item-container" id="">
            <h1 class="dashboard-title">Recepcionistas</h1>
            <p class="dashboard-content">{{$recepcionistas}}</p>
        </div>
        
        <div class="dashboard-item-container" id="">
            <h1 class="dashboard-title">Clientes</h1>
            <p class="dashboard-content">{{$clientes}}</p>
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

    <script src="{{asset('js/chart.js')}}"></script>
@endsection