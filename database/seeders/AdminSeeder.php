<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email'=> 'admin@example.com',
            'password'=> Hash::make('password'),
            'is_admin'=>true
        ]);
    }
}
