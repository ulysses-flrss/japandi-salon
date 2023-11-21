@extends('layouts.template')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endsection

@section('content')
    <main class="all-container">
        <article>
                <form action="{{route('reservacion.update', ['id' => $reservacion['codReservacion']])}}" id="formularioE" method="POST">
                    @csrf
                    <div class="form-container">
                        <div class="select-container field-container">
                            <label class="field-label" for="cliente">Cliente</label>
                            <select class="select-input" name="codUsuario" id="" disabled>
                                    <option value="{{$cliente['codUsuario']}}">{{$cliente['nombres'] . ' ' . $cliente['apellidos']}}</option>
                                    
                            </select>
                        </div>
        
                        <div class="field-container">
                            <label class="field-label" for="fecha">Fecha:</label>
                            <input class="field-input" type="date" name="fecha" id="" value="{{$reservacion['fechaReservacion']}}">
                        </div>
    
                        <div class="field-container">
                            <label class="field-label" for="hora">Hora:</label>
                            <input class="field-input" type="time" name="hora" id="" max="17:00" min="08:00" value="{{$reservacion['horaReservacion']}}">
                        </div>
    
                        <div class="field-container">
                            <label class="field-label" for="justificacion">Justificacion:</label>
                            <input class="field-input" type="text" name="justificacion" id="" value="{{$reservacion['justificacion']}}">
                        </div>
                        <div class="field-container">
        
                            <input type="submit" id="submit-button" class="field-input" value="Modificar Reservación">
        
                        </div>
                    </div>
                    
            </form>
        </article>
    </main>
@endsection

