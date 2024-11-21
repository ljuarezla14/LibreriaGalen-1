<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    protected $model = Products::class;

    public function definition(): array
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;
        $brand = $category->brands->random();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99, 49.99, 99.99]),
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brand->id,
            'quantity'=> $this->faker->numberBetween(0, 50),
            'status' => 2
        ];
    }
}
