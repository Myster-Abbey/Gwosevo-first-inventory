<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'admin@mail.com',
                'role' => 'Super Administrator',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Consider using Hash::make for security
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Henry Kwao',
                'email' => 'henry.kwao@gwosevo.com',
                'role' => 'Super Administrator',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Dorcas Koney',
                'email' => 'dorckiekon@gmail.com',
                'role' => 'Super Administrator',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
        ]);
    }
}
