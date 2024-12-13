<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'radityo890@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('qazxsw'), 
            ]
        );
    }
}
