<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fields')->insert(
            [
                [
                    'field_id' => 1,
                    'name' => 'Civil',
                ],
                [
                    'field_id' => 2,
                    'name' => 'Laica',
                ],
                [
                    'field_id' => 3,
                    'name' => 'Eclesiastica',
                ],
            ]
        );
    }
}
