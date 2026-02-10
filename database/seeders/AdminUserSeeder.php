<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'powolnymarcel@gmail.com'],
            [
                'name' => 'Marcel Powolny',
                'password' => Hash::make('123456'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'deborah@confortho.eu'],
            [
                'name' => 'Deborah',
                'password' => Hash::make('motdeP@s342!d'),
                'is_admin' => true,
            ]
        );
    }
}
