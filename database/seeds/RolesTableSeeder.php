<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create([
        	'name' => 'ADMINISTRADOR',
        	'slug' => 'admin',
        	'description' => 'Administrador del sistema',
        	'special' => 'all-access',
            'editable' => false
        ]);

        Role::create([
        	'name' => 'CUIDADOR',
        	'slug' => 'cuidador',
        	'description' => 'Encargado de...',
        	'special' => 'no-access'
        ]);

        Role::create([
        	'name' => 'SUPERVISOR',
        	'slug' => 'supervisor',
        	'description' => 'Encargado de...',
        	'special' => 'no-access'
        ]);
        
        Role::create([
        	'name' => 'INVITADO',
        	'slug' => 'invitado',
        	'description' => 'Visitante del sistema',
            'special' => 'no-access'
        ]);
    }
}
