<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


// Admin - Recepcionista
    // Guardar Reservacion
    Route::post('/reservacion/store', [ReservacionController::class, 'store'])->name('reservacion.store');

    // Guardar Usuario
    Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');

    // Aprobación y Reprobación de Reservaciones
    Route::get('/approve/{id}', [ReservacionController::class, 'approve'])->name('reservacion.approve');
    Route::get('/deny/{id}', [ReservacionController::class, 'deny'])->name('reservacion.deny');

    // Eliminar Usuario
    Route::get('/usuario/delete/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

    // Eliminar Reservacion

    // Modificar Usuario
    Route::put('/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');

    // Modificar Reservacion
    Route::put('/reservacion/update/{id}', [ReservacionController::class, 'update'])->name('reservacion.update');


//Admin 
    // Pagina Principal
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Listado de Usuarios
    Route::get('/admin/listUsuarios', [AdminController::class, 'listUsuarios'])->name('admin.listUsuarios');

    //Listado de Reservaciones
    Route::get('/admin/listReservaciones', [AdminController::class, 'listReservaciones'])->name('admin.listReservaciones');

    // Creación de Usuario (Recepcionista y Cliente)
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/reservacion/create', [AdminController::class, 'create_usuario'])->name('admin.usuario.create');
    
    // Modificación de Usuarios
    Route::get('/admin/usuario/show/{id}', [UsuarioController::class, 'show'])->name('admin.usuario.show');

    // Modificacion de reservaciones
    Route::get('/admin/reservacion/show/{id}', [RecepcionistaController::class, 'show'])->name('admin.reservacion.show');



// Recepcionista
    // Pagina Principal
    Route::get('/recepcionista', [RecepcionistaController::class, 'index'])->name('recepcionista.index');

    // Listado de Clientes
    Route::get('/recepcionista/listClientes', [RecepcionistaController::class, 'listClientes'])->name('recepcionista.listClientes');

    // Listado de Reservaciones
    Route::get('/recepcionista/listReservaciones', [RecepcionistaController::class, 'listReservaciones'])->name('recepcionista.listReservaciones');

    // Modificación de Reservaciones
    Route::get('/recepcionista/show/{id}', [RecepcionistaController::class, 'show'])->name('recepcionista.reservacion.show');

    