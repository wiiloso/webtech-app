<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' => 'api','name' => 'roles']);
        Permission::create(['guard_name' => 'api','name' => 'lista-roles']);
        Permission::create(['guard_name' => 'api','name' => 'listar-categoria']);
        Permission::create(['guard_name' => 'api','name' => 'crear-categoria']);
        Permission::create(['guard_name' => 'api','name' => 'editar-categoria']);
        Permission::create(['guard_name' => 'api','name' => 'listar-subcategorias']);
        Permission::create(['guard_name' => 'api','name' => 'crear-subcategorias']);
        Permission::create(['guard_name' => 'api','name' => 'editar-subcategorias']);
        Permission::create(['guard_name' => 'api','name' => 'listar-producto']);
        Permission::create(['guard_name' => 'api','name' => 'entrada-productos']);
        Permission::create(['guard_name' => 'api','name' => 'lista-compras']);
        Permission::create(['guard_name' => 'api','name' => 'kardex']);
        Permission::create(['guard_name' => 'api','name' => 'crear-proveedor']);
        Permission::create(['guard_name' => 'api','name' => 'editar-proveedor']);
        Permission::create(['guard_name' => 'api','name' => 'ruta-robot']);

        $role1 = Role::create(['guard_name' => 'api','name' => 'Super-Admin']);

        $role2 = Role::create(['guard_name' => 'api','name' => 'admin']);
        $role2->givePermissionTo('listar-categoria');
        $role2->givePermissionTo('crear-categoria');


        $role3 = Role::create(['guard_name' => 'api','name' => 'empleado']);
        $role3->givePermissionTo('kardex');
        $role3->givePermissionTo('lista-compras');


        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmind@gmail.com',
            'password' => bcrypt('Password$123.')
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('Password$123.')
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Empleado',
            'email' => 'empleado@gmail.com',
            'password' => bcrypt('Password$123.')
        ]);
        $user->assignRole($role3);
    }
}