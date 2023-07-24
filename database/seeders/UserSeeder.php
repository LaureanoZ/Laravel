<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'email' => 'laureano.zalazar@davinci.edu.ar',
                'password' => Hash::make('laureano'),
                'admin' => true,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'email' => 'mary@bailey.com',
                'password' => Hash::make('laureano'),
                'admin' => false,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'email' => 'homero@simpson.com',
                'password' => Hash::make('laureano'),
                'admin' => false,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'email' => 'edna@krabappel.com',
                'password' => Hash::make('laureano'),
                'admin' => false,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('user_has_services')->insert([
            [
                'user_id' => 2,
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'service_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'service_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
