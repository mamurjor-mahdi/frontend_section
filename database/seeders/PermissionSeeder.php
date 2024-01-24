<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dashboardModule = Module::updateOrCreate(['name'=>'Dashboard Manage'], ['name' => 'Dashboard Manage']);
        Permission::create([
            'module_id'=> $dashboardModule->id,
            'name'=> 'Dashboard Access',
            'slug'=> 'app.dashboard',
        ]);

        $roleModule = Module::updateOrCreate(['name'=>'Role Manage'], ['name' => 'Role Manage']);
        Permission::create([
            'module_id'=> $roleModule->id,
            'name'=> 'Role Access',
            'slug'=> 'app.roles.index',
        ]);
        Permission::create([
            'module_id'=> $roleModule->id,
            'name'=> 'Role Create',
            'slug'=> 'app.roles.create',
        ]);
        Permission::create([
            'module_id'=> $roleModule->id,
            'name'=> 'Role Edit',
            'slug'=> 'app.roles.edit',
        ]);
        Permission::create([
            'module_id'=> $roleModule->id,
            'name'=> 'Role Delete',
            'slug'=> 'app.roles.delete',
        ]);

        $userModule = Module::updateOrCreate(['name'=>'User Manage'], ['name' => 'User Manage']);

        Permission::create([
            'module_id' => $userModule->id,
            'name' => 'User Access',
            'slug' => 'app.users.index',
        ]);
        Permission::create([
            'module_id' => $userModule->id,
            'name' => 'User Create',
            'slug' => 'app.users.create',
        ]);
        Permission::create([
            'module_id' => $userModule->id,
            'name' => 'User Edit',
            'slug' => 'app.users.edit',
        ]);
        Permission::create([
            'module_id' => $userModule->id,
            'name' => 'User Delete',
            'slug' => 'app.users.delete',
        ]);
    }
}
