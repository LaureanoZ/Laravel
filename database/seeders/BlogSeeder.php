<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'blog_id' => 1,
                'author' => 'Homero Simpson',
                'title' => 'Prueben la tematica Blanca y Dorada para las Fiestas',
                'review' => 'Fui a una boda hermosa que tenia esta tematica, y la verdad no la habia visto nunca, se los recomiendo, quedo muy, pero muy elegante y todo convinaba acon todo, incluso si alguien tenia algun detalle de alajas o joyeria, queda presioso con la decoracion del lugar, ¡100% recomendado!',
                'release_date' => '2023-5-15',
                'profile_image' => 'homero.png',
                'profile_image_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_id' => 2,
                'author' => 'Mary Bailey',
                'title' => 'Comida vegana en la recepción',
                'review' => 'No soy vegana, pero este finde semana fui a una boda de unos amigos, y me encontre con el caterin de la recepcion era vegano, para mi sorpresa libre de gluten tambien, no voy a mentir, al principio no me gusto la idea, pero al probar un par de pasa palos, me entregue a los sabores y me encantaron, recomiendo este tipo de variantes en los caterings',
                'release_date' => '2023-5-10',
                'profile_image' => 'mary.png',
                'profile_image_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_id' => 3,
                'author' => 'Edna Krabappel',
                'title' => 'Animales en las bodas',
                'review' => '¡Hola!, consulta, tengo una boda en dos semanas, y me gustaria saber si es muy inoportuno llevar a mi gato a la misma, no tengo con quien dejarlo y no me gusta que este solo, ¿seria muy tragico si lo llevase conmigo? quizas hasta podria llevar los anillos jajaja, bueno, me gustaria alguna opinion para ver que hago, ¡Gracias!',
                'release_date' => '2023-4-5',
                'profile_image' => 'edna.png',
                'profile_image_description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
