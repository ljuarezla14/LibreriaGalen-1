<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'vendedor']);

        User::create([
            'name' => 'Kevin Martinez',
            'email' => 'admin@correo.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Brayan Martinez',
            'email' => 'vendedor@correo.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('vendedor');
    }
}
