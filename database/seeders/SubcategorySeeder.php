<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            /* Celulares y tablets */
              [
                'category_id' => 1,
                'name' => 'Libros',
                'slug' => Str::slug('Libros'),
            ],

            [
                'category_id' => 1,
                'name' => 'Fabulas',
                'slug' => Str::slug('Fabulas'),
            ],

            [
                'category_id' => 1,
                'name' => 'Cuentos',
                'slug' => Str::slug('Cuentos'),
            ],

            /* TV, audio y video */

            [
                'category_id' => 2,
                'name' => 'Lapices',
                'slug' => Str::slug('Lapices'),
            ],
            [
                'category_id' => 2,
                'name' => 'Tijeras',
                'slug' => Str::slug('Tijeras'),
            ],

            [
                'category_id' => 2,
                'name' => 'Colores',
                'slug' => Str::slug('Colores'),
            ],

            /* Consola y videojuegos */
            [
                'category_id' => 3,
                'name' => 'Laminas',
                'slug' => Str::slug('Laminas'),
            ],

            [
                'category_id' => 3,
                'name' => 'Imagenes',
                'slug' => Str::slug('Imagenes'),
            ],

            [
                'category_id' => 3,
                'name' => 'Revistas',
                'slug' => Str::slug('Revistas'),
            ],


            /* Computación */

            [
                'category_id' => 4,
                'name' => 'Portátiles',
                'slug' => Str::slug('Portátiles'),
            ],

            [
                'category_id' => 4,
                'name' => 'PC escritorio',
                'slug' => Str::slug('PC escritorio'),
            ],

            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
            ],

            [
                'category_id' => 4,
                'name' => 'Accesorios computadoras',
                'slug' => Str::slug('Accesorios computadoras'),
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
