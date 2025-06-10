<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => "Bob",
            'email' => "bob@mail.com",
            'phone' => '09777777777',
            'address' => "Yangon, Myanmar",
            'gender' => 'male',
            'password' => Hash::make('password'),
        ]);

        $client = User::create([
            'name' => "Alice",
            'email' => "alice@mail.com",
            'phone' => '09777777777',
            'address' => "Yangon, Myanmar",
            'gender' => 'male',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('admin');
        $client->assignRole('client');
    }
}
