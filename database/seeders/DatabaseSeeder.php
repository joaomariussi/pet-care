<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::query()->create([
             'name' => 'Gustavo May',
             'email' => 'gustavo@rockyecommerce.com.br',
             'password' => Hash::make('UntDev@2023'),
             'password_recovery_token' => encrypt('UntDev@2023'),
             'type' => 'webmaster'
         ]);

         User::query()->create([
             'name' => 'Eunir Kaiser',
             'email' => 'eunirk@gmail.com',
             'password' => Hash::make('UntDev@2023'),
             'password_recovery_token' => encrypt('UntDev@2023'),
             'type' => 'webmaster'
         ]);
    }
}
