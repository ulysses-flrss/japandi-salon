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
    Route::get('/approve/{id}', [ReservacionController::class, 'approve'])->name('reservacion.approve')->middleware('auth');
    Route::get('/deny/{id}', [ReservacionController::class, 'deny'])->name('reservacion.deny')->middleware('auth');

    // Eliminar Usuario
    Route::delete('/usuario/delete/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy')->middleware('auth');

    // Eliminar Reservacion

    // Modificar Usuario
    Route::post('/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update')->middleware('auth');

    // Modificar Reservacion
    Route::post('/reservacion/update/{id}', [ReservacionController::class, 'update'])->name('reservacion.update')->middleware('auth');

    Route::get('/reservaciones/{id}', [ReservacionController::class, 'listByUser'])->name('reservacion.listByUser')->middleware('auth');


//Admin 
    // Pagina Principal
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
    Route::get('/admin/reservacionesPorDia', [AdminController::class, 'getReservacionPorDia'])->name('admin.reservacionesPorDia')->middleware('auth');

    // Listado de Usuarios
    Route::get('/admin/listUsuarios', [AdminController::class, 'listUsuarios'])->name('admin.listUsuarios')->middleware('auth');

    //Listado de Reservaciones
    Route::get('/admin/listReservaciones', [AdminController::class, 'listReservaciones'])->name('admin.listReservaciones')->middleware('auth');

    // Creación de Usuario (Recepcionista y Cliente)
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create')->middleware('auth');
    Route::get('/admin/reservacion/create', [AdminController::class, 'create_usuario'])->name('admin.usuario.create')->middleware('auth');
    
    // Mostrar Usuario
    Route::get('/admin/usuario/show/{id}', [UsuarioController::class, 'show'])->name('admin.usuario.show')->middleware('auth');

    // Mostrar Reservacion
    Route::get('/admin/reservacion/show/{id}', [AdminController::class, 'show'])->name('admin.reservacion.show')->middleware('auth');



// Recepcionista
    // Pagina Principal
    Route::get('/recepcionista', [RecepcionistaController::class, 'index'])->name('recepcionista.index')->middleware('auth');

    // Listado de Clientes
    Route::get('/recepcionista/listClientes', [RecepcionistaController::class, 'listClientes'])->name('recepcionista.listClientes')->middleware('auth');

    // Listado de Reservaciones
    Route::get('/recepcionista/listReservaciones', [RecepcionistaController::class, 'listReservaciones'])->name('recepcionista.listReservaciones')->middleware('auth');

    // Mostrar Reservacion
    Route::get('/recepcionista/reservacion/show/{id}', [RecepcionistaController::class, 'show'])->name('recepcionista.reservacion.show')->middleware('auth');

    // Mostrar Cliente
    Route::get('/recepcionista/cliente/show/{id}', [RecepcionistaController::class, 'show_cliente'])->name('recepcionista.cliente.show')->middleware('auth');

    // Crear Cliente
    Route::get('/recepcion/cliente/create', [RecepcionistaController::class, 'create'])->name('recepcionista.usuario.create')->middleware('auth');
    