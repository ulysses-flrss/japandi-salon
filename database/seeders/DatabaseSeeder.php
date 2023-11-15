<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder "Roles"
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Recepcionista',
        ]);

        DB::table('roles')->insert([
            'nombre' => 'Cliente',
        ]);


        // Seeder "Usuarios"
        DB::table('usuarios')->insert([
            'nombres' => 'Ulises',
            'apellidos' => 'Flores',
            'codRol' => 1,
            'telefono' => '7611-5190',
            'dui' => '06667402-9',
            'correo' => 'ulisesf3136@gmail.com',
            'password' => Hash::make('admin1'),
            'numReservaciones' => NULL
        ]);

        DB::table('usuarios')->insert([
            'nombres' => 'Katherine Regina',
            'apellidos' => 'Alvarado Castillo',
            'codRol' => 2,
            'telefono' => '7193-2912',
            'dui' => '07283102-1',
            'correo' => 'katherine.castillo@japandi.com',
            'password' => Hash::make('recepcion1'),
            'numReservaciones' => NULL
        ]);

        DB::table('usuarios')->insert([
            'nombres' => 'Andrea Carolina',
            'apellidos' => 'Cartagena Posada',
            'codRol' => 3,
            'telefono' => '6139-2490',
            'dui' => '01748302-3',
            'correo' => NULL,
            'password' => NULL,
            'numReservaciones' => NULL
        ]);
    }
}
