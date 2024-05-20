<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'ADMIN',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'sales',
            'email' => 'sales@sales.com',
            'role' => 'SALES',
            'password' => Hash::make('password')
        ]);
    }
}
