

@extends("layouts.template")

@section('head')
    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
    
@endsection


@section('content')

<main>
    <div class="inicio-register">
        
        <h1 class="bienvenida-register">Bienvenido a Japandi Salon</h1>
    </div>

    <article>
        <section class="form-container">
            <form action="{{route('login.login')}}" id="formularioE" method="POST">
                @csrf
                <div class="form-login">
                    <div class="correo">
                        <label for="correo">Correo:</label>
                        <input type="text" name="correo" id="correo" placeholder="Ingrese su Correo">
                    </div>

                    <div class="password">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
                    </div>

                    <div class="submit">

                        <button id="submit_login" type="submit">Iniciar Sesión</button>

                    </div>
                </div>
            </form>
        </section>
    </article>
</main>





@endsection
