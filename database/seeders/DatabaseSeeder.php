<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdultsSeeder::class);
        $this->call(DesignSeeder::class);
        $this->call(FieldSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BlogSeeder::class);
    }
}
