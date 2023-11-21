@extends('layouts.template')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endsection

@section('content')
    <main class="all-container">
        <article>

                <form action="{{ route('usuario.update', ["id" => $usuario['codUsuario']]) }}" method="POST">
                    @csrf
                    <div class="form-container">
                        <div class="select-container field-container">
                            <label class="field-label" for="">Tipo de Usuario</label>
                            <select name="codRol" id="select_button" class="select-input" disabled>
                                @if($usuario['codRol'] == 2)
                                    <option selected value="2">Recepcionista</option>
                                    <input type="hidden" name="codRol" value="{{$usuario['codRol']}}">
                                @else
                                    <option selected value="3" id="option-cliente">Cliente</option>
                                    <input type="hidden" name="codRol" value="{{$usuario['codRol']}}">
                                @endif
                            </select>
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">Nombres*</label>
                            <input class="field-input" type="text" name="nombres" value="{{$usuario['nombres']}}">
                            @error('nombres')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">Apellidos*</label>
                            <input class="field-input" type="text" name="apellidos" value="{{$usuario['apellidos']}}">
                            @error('apellidos')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">Telefono*</label>
                            <input class="field-input" type="text" name="telefono" value="{{$usuario['telefono']}}">
                            @error('telefono')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">DUI*</label>
                            <input class="field-input" type="text" name="dui" value="{{$usuario['dui']}}">
                            @error('dui')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>

                        <div class="recepcion-div field-container">
                            <label class="field-label" for="">Correo*</label>
                            <input class="field-input" type="email" id="correo-input" name="correo" required value="{{$usuario['correo']}}">
                            @error('correo')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="recepcion-div field-container">
                            <label class="field-label" for="" style="text-align: center">Contraseña <br> <small> (dejar vacio si no se va cambiar) </small></label>
                            <input class="field-input" type="password" id="password-input" name="password" value="">
                            @error('password')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>

                        

                        <div class="field-container" id="submit-container">
                            <input class="field-input" type="submit" id="submit-button" value="Modificar Recepcionista">
                        </div>

                    </div>

                </form>

        </article>
    </main>

    <script>
            if (document.querySelector("#option-cliente").selected = "2") {
                
            
                    document.querySelectorAll(".recepcion-div").forEach(function (element) {
                    element.style.display = "none";
                    document.querySelector("#correo-input").removeAttribute("required",)
                    document.querySelector("#password-input").removeAttribute("required",)
                    document.querySelector("#submit-button").value = "Modificar Cliente"

                    document.querySelector(".form-container").style.gridTemplateColumns = "20% 20%"
                    document.querySelector(".select-container").style.gridColumn = "1 / 3"
                    document.querySelector("#submit-container").style.gridColumn = "1 / 3"
                })
            }
        </script>
@endsection
