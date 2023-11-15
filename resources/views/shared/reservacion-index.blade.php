@extends('layouts.template')

@section('head')
<link rel="stylesheet" href="{{asset('css/index-style.css')}}">
<link rel="stylesheet" href="{{asset('css/tabla.css')}}">
<link rel="stylesheet" href="{{asset('css/cita-style.css')}}">
@endsection

@section('content')
<main class="allContainer">
    <div class="bienvenida" id="container-bienvenida2">
        <h1 id="bienvenida" title="Bienvenida">Ver Reservaciones</b></h1>
    </div>

    <article class="mainArticle">
        <div>
            <form action="{{route('reservacion.store')}}" class="form-container" method="POST">
                @csrf
                <div class="perfil">
                    <label for="">Cliente:</label>
                    <select name="codCliente" id="codCliente">
                        <option value="">Seleccione un cliente</option>
                        
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->codUsuario}}">{{$cliente->nombres . ' ' .$cliente->apellidos}}</option>  
                        @endforeach
                    </select>
                    @error('codCliente')
                        <br>
                        <small>*{{$message}}</small>	
                    @enderror
                </div>
                <div class="perfil">
                    <label for="">Fecha de Reservación</label>
                    <input type="date" name="fecha" id="fecha">
                    @error('fecha')
                        <br>
                        <small>*{{$message}}</small>
                    @enderror
                </div>

                <div class="perfil">
                    <label for="">Justificación</label>
                    <input type="text" name="justificacion" id="justificacion">
                    @error('justificacion')
                        <br>
                        <small>*{{$message}}</small>
                        
                    @enderror
                </div>

                <input type="submit" value="Agregar">
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                   <tr>
                        <th scope="col">ID Reservacion</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Fecha de la Reservacion</th>
                        <th scope="col">Justificacion</th>
                        <th scope="col">Estado
                        <th scope="col">Acciones</th>
                    </tr>
        
                </thead>
                <tbody scope="row">    
                    @foreach ($reservaciones as $reservacion)
                        <tr>
                            <td>{{$reservacion['codReservacion']}}</td>
                            <td>{{$reservacion['nombres'] . ' ' . $reservacion['apellidos']}}</td>
                            <td>{{$reservacion['fechaReservacion']}}</td>
                            <td>{{$reservacion['justificacion']}}</td>
                            <td>{{$reservacion['estado']}}</td>
                        </tr>
                    @endforeach
                 </tbody>
                </table>
            </div>
    </article>
@endsection

