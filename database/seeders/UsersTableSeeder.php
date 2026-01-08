<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario activo
        User::create([
            'name' => 'Activo',
            'email' => 'activo@example.com',
            'password' => bcrypt('password'),
            'is_active' => true,
        ]);

        // Usuario inactivo
        User::create([
            'name' => 'Inactivo',
            'email' => 'inactivo@example.com',
            'password' => bcrypt('password'),
            'is_active' => false,
        ]);
    }
}
