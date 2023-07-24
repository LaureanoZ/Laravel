<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'service_id' => 1,
                'field_id' => 1,
                'adult_id' => 1,
                'title' => 'Pack Boda Civil',
                'price' => 9999,
                'description' => 'Página web elegante para compartir información de tu boda civil con tus invitados.',
                'blocks' => 'Presentacion de los novios, información de la ceremonia, galería de fotos.',
                'image' => 'civil.png',
                'image_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'field_id' => 2,
                'adult_id' => 2,
                'title' => 'Pack Boda Laica',
                'price' => 15000,
                'description' => 'Página web personalizada con galería de fotos y videos, lista de regalos y RSVP en línea para tu boda.',
                'blocks' => 'Lista comunitaria de Spotify, galería de fotos y videos, lista de regalos, RSVP en línea, sección de preguntas frecuentes.',
                'image' => 'laica.png',
                'image_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'field_id' => 3,
                'adult_id' => 1,
                'title' => 'Pack Boda Iglesia',
                'price' => 20000,
                'description' => 'Página web con diseño exclusivo y características avanzadas como integración con redes sociales, mapa interactivo y opción de envío de invitaciones digitales.',
                'blocks' => 'Integración con redes sociales, mapa interactivo con ubicación de lugares de interés, opción de envío de invitaciones digitales con recordatorios, sección de comentarios y saludos de los invitados.',
                'image' => 'iglesia.png',
                'image_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('services_has_designs')->insert([
            [
                'service_id' => 1,
                'design_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 1,
                'design_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 1,
                'design_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'design_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 2,
                'design_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'design_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_id' => 3,
                'design_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
