<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        /* USERS */
        Permission::create([
    		'name' => 'Listar usuarios',
    		'slug' => 'users.index',
    		'description' => 'Permite listar los usuarios registrados en el sistema'
    	]);

        Permission::create([
            'name' => 'Registrar usuarios',
            'slug' => 'users.create',
            'description' => 'Permite registrar nuevos usuarios en el sistema'
        ]);

        Permission::create([
    		'name' => 'Editar usuarios',
    		'slug' => 'users.edit',
    		'description' => 'Permite editar los usuarios registrados en el sistema'
    	]);

        Permission::create([
            'name' => 'Visualización de usuarios',
            'slug' => 'users.show',
            'description' => 'Permite mostrar una descripcción completa de un rol existente'
        ]);
        
        Permission::create([
            'name' => 'Eliminar usuarios',
            'slug' => 'users.destroy',
            'description' => 'Permite eliminar roles de usuario existentes'
        ]);

    	Permission::create([
    		'name' => 'Cambiar estado de usuarios',
    		'slug' => 'users.editState',
    		'description' => 'Permite habilitar o deshabilitar los usuarios registrados en el sistema'
    	]);

        Permission::create([
            'name' => 'Restablecer contraseñas',
            'slug' => 'users.resetPassword',
            'description' => 'Permite restablecer la contraseña de los usuarios registrados en el sistema'
        ]);

        Permission::create([
            'name' => 'Asignar roles',
            'slug' => 'users.assignRole',
            'description' => 'Permite asignar roles a usuarios a los usuarios del sistema'
        ]);

        /* ROLES */
    	Permission::create([
    		'name' => 'Listar roles',
    		'slug' => 'roles.index',
    		'description' => 'Permite listar los roles de usuario existentes'
    	]);

    	Permission::create([
    		'name' => 'Crear roles',
    		'slug' => 'roles.create',
    		'description' => 'Permite crear nuevos roles de usuario'
    	]);

    	Permission::create([
    		'name' => 'Editar roles',
    		'slug' => 'roles.edit',
    		'description' => 'Permite editar los roles de usuario existentes'
    	]);

    	Permission::create([
    		'name' => 'Visualización de roles',
    		'slug' => 'roles.show',
    		'description' => 'Permite mostrar una descripcción completa de un rol existente'
    	]);
    	
    	Permission::create([
    		'name' => 'Eliminar roles',
    		'slug' => 'roles.destroy',
    		'description' => 'Permite eliminar roles de usuario existentes'
    	]);
    }
}
