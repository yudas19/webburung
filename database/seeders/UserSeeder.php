<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sikatan.test'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@sikatan.test'],
            [
                'name'     => 'Peternak Burung',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ]
        );
    }
}
