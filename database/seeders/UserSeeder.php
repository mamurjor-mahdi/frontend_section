<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super = Role::where('slug','super-admin')->first();
        User::create([
            'role_id'=> $super->id,
            'name'=>'Super Admin',
            'email'=>'super@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make(12345678),
        ]);

        $admin = Role::where('slug','admin')->first();
        User::create([
            'role_id'=> $admin->id,
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make(12345678),
        ]);

        $client = Role::where('slug','client')->first();
        User::create([
            'role_id'=> $client->id,
            'name'=>'Client',
            'email'=>'client@gmail.com',
            'email_verified_at'=>null,
            'password'=>Hash::make(12345678),
        ]);
    }
}
