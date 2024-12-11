<?php

namespace App\Livewire\Admin;

use App\Models\Brands;
use App\Models\Category;
use Livewire\Component;
use App\Models\Products;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Str;

class EditProduct extends Component
{
    public $product, $name, $description, $price, $quantity;
    public $categories, $subcategories, $brands, $slug, $subcategory_id="", $brand_id="";

    public $category_id;

    protected $rules = [
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'name' =>  'required',
        'slug' => 'required|unique:products, slug',
        'description' => 'required',
        'brand_id' =>  'required',
        'price' => 'required',
        'quantity' => 'required'
    ];

    protected $listeners = ['delete'];

    public function mount( Products $product){

        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;

        $this->categories = Category::all();

        $this->category_id = $product->subcategory->category->id;

        // $this->subcategories =  $product->subcategory->id;
        $this->subcategories = Subcategory::where('category_id', $this->category_id )->get();

        $this->subcategory_id = $product->subcategory->id;


        $this->slug = $this->product->slug;

        $this->brands = Brands::whereHas('categories', function(Builder $query){
            $query->where('category_id', $this->category_id);
        })->get();

        $this->brand_id = $product->brand_id;

    }

    public function save(){
        $rules = $this->rules;

        $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;

        $this->validate($rules);

        $this->product->subcategory_id = $this->subcategory_id;

        $this->product->slug = $this->slug;

        $this->product->name = $this->name;

        $this->product->description = $this->description;

        $this->product->brand_id = $this->brand_id;

        $this->product->price = $this->price;

        $this->product->quantity = $this->quantity;

        $this->product->save();

        $this->dispatch('saved');
        redirect()->route('admin.admin.index');

    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->brands = Brands::whereHas('categories', function(Builder $query) use ($value){
            $query->where('category_id', $value);
        })->get();

        $this->reset(['subcategory_id', 'brand_id']);
        // $this->product->subcategory_id = "";
        // $this->product->brand_id = "";

    }

    public function delete(){
        $this->product->delete();

        return redirect()->route('admin.admin.index');
    }
    public function render()
    {

        // dd($this->product);
        // dd($this->brands);

        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
