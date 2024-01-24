<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_permissions = Permission::all();

        Role::create([
            'name'=> 'Super Admin',
            'slug'=> 'super-admin',
        ])->permissions()->sync($all_permissions->pluck('id'));

        Role::create([
            'name'=> 'Admin',
            'slug'=> 'admin',
        ])->permissions()->sync($all_permissions->pluck('id'));
         
        Role::create([
            'name'=> 'Client',
            'slug'=> 'client',
        ]);
    }
}
