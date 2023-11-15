<nav class='barNav'>
    <ul class='barNavegacion' id='nav'>

        <li class='bar-item'>
            <a href='{{route("admin.index")}}' class='bar-link'>
                <img src="{{asset('imgs/logo.png')}}" alt="Logo" class="logo" title="Logo">
                <span class='link-text' id ='welcome-text'>Japandi Salon</span>
            </a>
        </li>



        <li class='bar-item' id='li-familiares' title='Familiares'>
            <a href='{{route('admin.listReservaciones')}}' class='bar-link' >

                <i class="fa-solid fa-hotel icon"></i>
                <span class='link-text'>Gestionar Reservaciones</span>
            </a>
        </li>

        <li class='bar-item' id='li-familiares' title='Familiares'>
            <a href='{{route('admin.listUsuarios')}}' class='bar-link' >

                <i class="fa-solid fa-users icon"></i>
                <span class='link-text'>Gestionar Usuarios</span>
            </a>
        </li>





        <li class='bar-item' id='li-familiares' title='Familiares'>
            <a href='{{route('login.logout')}}' id="button_logout" class='bar-link' >

                <i class="fa-solid fa-user icon"></i>
                <span class='link-text'>Cerrar Sesión</span>
            </a>
        </li>
        
    </ul>
</nav>