<?php

namespace App\Livewire\Admin;

use App\Models\Brands;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{

    use WithFileUploads;
    public $brands, $categories, $category, $rand, $nameCreate, $nameEdit, $slugEdit, $slugCreate;
    protected $listeners = ['delete'];

    public $createForm =[
        'slug' => null,
        'brands' => [],
    ];

    public $editForm =[
        'open'=> false,
        'brands' => [],
    ];

    public $editImage;

    protected $rules =[
        'nameCreate' => 'required',
        'slugCreate' => 'required|unique:categories,slug',
        'createForm.brands' => 'required',
    ];

    protected $validationAttributes =[
        'nameCreate' => 'nombre',
        'slugCreate' => 'slug',
        'createForm.brands' => 'marcas',
        'nameEdit' => 'nombre',
        'slugEdit' => 'slug',
        'editForm.brands' => 'marcas',
    ];

    public function mount(){
        $this->getBrands();
        $this->getCategories();
        $this->rand = rand();
    }

    public function updatedNameCreate($value){
        $this->slugCreate = Str::slug($value);
    }

    public function updatedNameEdit($value){
        $this->slugEdit = Str::slug($value);
    }

    public function getBrands(){
        $this->brands = Brands::all();
    }

    public function getCategories(){
        $this->categories = Category::all();
    }

    public function save(){
        $this->validate();

        $category = Category::create([
           'name' => $this->nameCreate,
           'slug' => $this->slugCreate,
        ]);

        $category->brands()->attach($this->createForm['brands']);

        $this->rand = rand();
        $this->reset(['createForm', 'nameCreate', 'slugCreate']);

        $this->getCategories();
        $this->dispatch('saved');
    }

    public function edit(Category $category){
        $this->resetValidation();

        $this->category = $category;

        $this->editForm['open'] = true;
        $this->nameEdit = $category->name;
        $this->slugEdit = $category->slug;
        $this->editForm['brands'] = $category->brands->pluck('id');
    }

    public function update(){

        $rules =[
            'nameEdit' => 'required',
            'slugEdit' => 'required|unique:categories,slug,' . $this->category->id,
            'editForm.brands' => 'required',
        ];

        $this->validate($rules);

        $this->category->update([
            'name' => $this->nameEdit,
            'slug' => $this->slugEdit
        ]);
        $this->category->brands()->sync($this->editForm['brands']);

        $this->reset(['editForm', 'nameEdit', 'slugEdit']);

        $this->getCategories();
    }

    public function delete(Category $category){
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }


}
