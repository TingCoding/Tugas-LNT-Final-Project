<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'admin',
            'personId' => '5872',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'nomorHp' => '058725872',
            'role' => 'admin'
        ]);

        \App\Models\User::create([
            'name' => 'user',
            'personId' => '22',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'nomorHp' => '012345678',
            'role' => 'user'
        ]);
    }
}
