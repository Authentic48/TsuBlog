<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();


        $admin = User::create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
        ]);
        $manager = User::create([
            'name' => env('MANAGER_NAME'),
            'email' => env('MANAGER_EMAIL'),
            'password' => bcrypt(env('MANAGER_PASSWORD')),
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
    }
}
