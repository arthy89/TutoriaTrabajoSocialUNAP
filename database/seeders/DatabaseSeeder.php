<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ?ROLES
        Rol::factory()->create([
            'rol_name' => 'Administrator',
        ]);

        Rol::factory()->create([
            'rol_name' => 'Tutor',
        ]);

        Rol::factory()->create([
            'rol_name' => 'Estudiante',
        ]);

        // ! USUARIOS
        User::factory()->create([
            'dni' => '11111111',
            'name' => 'Admin',
            'apell' => 'Admin_p',
            'password' => Hash::make('123123'),
            'id_rol' => 1,
        ]);

        //? Tutores
        User::factory()->create([
            'dni' => '22222221',
            'name' => 'Tutor',
            'apell' => 'Tutor_p',
            'password' => Hash::make('123123'),
            'id_rol' => 2,
        ]);

        User::factory()->create([
            'dni' => '22222222',
            'name' => 'CARMEN LUZ',
            'apell' => 'FERNANDEZ CHAMBI',
            'password' => Hash::make('123123'),
            'id_rol' => 2,
        ]);

        User::factory()->create([
            'dni' => '22222223',
            'name' => 'JUAN DIEGO',
            'apell' => 'AQUINO CORI',
            'password' => Hash::make('123123'),
            'id_rol' => 2,
        ]);

        //* Estudiantes
        User::factory()->create([
            'dni' => '33333333',
            'name' => 'Estudiante',
            'apell' => 'Estudiante_p',
            'password' => Hash::make('123123'),
            'id_rol' => 3,
        ]);

        User::factory()->create([
            'dni' => '75314955',
            'name' => 'CARLA MELIZA',
            'apell' => 'CATARI CARITA',
            'password' => Hash::make('123123'),
            'id_rol' => 3,
        ]);

        User::factory()->create([
            'dni' => '73812901',
            'name' => 'MONICA YESENIA',
            'apell' => 'CAMPOS LEIVA',
            'password' => Hash::make('123123'),
            'id_rol' => 3,
        ]);

        User::factory()->create([
            'dni' => '71372335',
            'name' => 'MIJAIL FRANCISCO',
            'apell' => 'VELASQUEZ LAQUISE',
            'password' => Hash::make('123123'),
            'id_rol' => 3,
        ]);
    }
}
