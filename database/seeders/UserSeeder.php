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
            'email' => 'admin@gmail.com',
            'nivel_acesso' => '1',
            'password' => Hash::make('senhaadmin01'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Bruno',
            'email' => 'bruno@gmail.com',
            'nivel_acesso' => '2',
            'password' => Hash::make('senhabruno01'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
