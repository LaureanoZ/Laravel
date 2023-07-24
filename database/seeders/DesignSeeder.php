<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designs')->insert([
            [
                'design_id' => 1,
                'name' => 'Romántico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'design_id' => 2,
                'name' => 'Clásico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'design_id' => 3,
                'name' => 'Bohemio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'design_id' => 4,
                'name' => 'Minimalista',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'design_id' => 5,
                'name' => 'Vintage',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'design_id' => 6,
                'name' => 'Moderno',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'design_id' => 7,
                'name' => 'Erotico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'design_id' => 8,
                'name' => 'Art Decó',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
