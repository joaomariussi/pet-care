<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'nome' => 'João Pedro Mariussi',
            'email' => 'joaomariussi10@gmail.com',
            'password' => Hash::make('123'),
            'password_recovery_token' => encrypt('123'),
            'type' => 'webmaster'
        ]);
    }
}
