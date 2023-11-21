@extends('layouts.template')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endsection

@section('content')
    <main class="all-container">
        <article>

                <form action="{{ route('usuario.store') }}" method="POST">
                    @csrf
                    <div class="form-container">
                        <div class="select-container field-container">
                            <label class="field-label" for="">Tipo de Usuario</label>
                            <input type="hidden" name="codRol" value="3">
                            <select name="codRol" id="select_button" class="select-input" disabled>
                                <option value="3">Cliente</option>
                            </select>
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">Nombres*</label>
                            <input class="field-input" type="text" name="nombres" value="{{old('nombres')}}">
                            @error('nombres')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">Apellidos*</label>
                            <input class="field-input" type="text" name="apellidos" value="{{old('apellidos')}}">
                            @error('apellidos')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">Telefono*</label>
                            <input class="field-input" type="text" name="telefono" value="{{old('telefono')}}">
                            @error('telefono')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="field-container">
                            <label class="field-label" for="">DUI*</label>
                            <input class="field-input" type="text" name="dui" value="{{old('dui')}}">
                            @error('dui')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>

                        <div class="recepcion-div field-container">
                            <label class="field-label" for="">Correo*</label>
                            <input class="field-input" type="email" id="correo-input" name="correo" required value="{{old('correo')}}">
                            @error('correo')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="recepcion-div field-container">
                            <label class="field-label" for="">Contraseña*</label>
                            <input class="field-input" type="password" id="password-input" name="password" required>
                            @error('password')
                                <small class="error-message" style="text-align: center">*{{$message}}</small>
                            @enderror
                        </div>
                        

                        <div class="field-container" id="submit-container">
                            <input class="field-input" type="submit" id="submit-button" value="Registrar Recepcionista">
                        </div>

                    </div>

                </form>

        </article>
    </main>

    <script>
            document.querySelectorAll(".recepcion-div").forEach(function (element) {
                element.style.display = "none";
                document.querySelector("#correo-input").removeAttribute("required",)
                document.querySelector("#password-input").removeAttribute("required",)
                document.querySelector("#submit-button").value = "Registrar Cliente"

                document.querySelector(".form-container").style.gridTemplateColumns = "20% 20%"
                document.querySelector(".select-container").style.gridColumn = "1 / 3"
                document.querySelector("#submit-container").style.gridColumn = "1 / 3"
            })
    </script>
@endsection
