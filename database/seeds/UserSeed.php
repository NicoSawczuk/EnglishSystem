<?php

use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(1593572486),
        ]);

        $rolAdmin = Role::create([
            'name' => 'ADMIN',
            'slug' => 'admin',
            'description' => 'puede realizar todas las operaciones del sistema',
            'special' => 'all-access'
        ]);


        $rolUsuario = Role::create([
            'name' => 'USUARIO',
            'slug' => 'usuario',
            'description' => 'no puede realizar todas las operaciones del sistema',
        ]);

        $usuario->roles()->sync($rolAdmin->id) ;
    }
}
