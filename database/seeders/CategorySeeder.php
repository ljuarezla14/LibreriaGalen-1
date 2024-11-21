<?php

namespace Database\Seeders;

use App\Models\Brands;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Libros',
                'slug' => Str::slug('Libros'),
            ],
            [
                'name' => 'Utiles Escolares',
                'slug' => Str::slug('Utiles Escolares'),
            ],

            [
                'name' => 'Imagenes',
                'slug' => Str::slug('Imagenes'),
            ],

            [
                'name' => 'Computación',
                'slug' => Str::slug('Computación'),
            ],

        ];

        foreach ($categories as $category){
            // $category = Category::factory(1)->create($category);
            $category = Category::factory(1)->create($category)->first();

            $brands = Brands::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
