<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adults')->insert([
            [
                'adult_id' => 1,
                'name' => 'Apta Todo Público',
                'abbreviation' => 'ATP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adult_id' => 2,
                'name' => 'Solo Mayores de 18 Años',
                'abbreviation' => 'M18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
