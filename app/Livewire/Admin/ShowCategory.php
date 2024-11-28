<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class ShowCategory extends Component
{
    public $category, $subcategories, $subcategory;
    public $nameCreate, $slugCreate, $nameEdit, $slugEdit;
    protected $listeners = ['delete'];

    public $open = false;

    protected $rules = [
        'nameCreate' => 'required',
        'slugCreate' => 'required|unique:subcategories,slug',
    ];

    protected $validationAttributes =[
        'nameCreate' => 'nombre',
        'slugCreate' => 'slug',
        'nameEdit' => 'nombre',
        'slugEdit' => 'slug',

    ];



    public function updatedNameCreate($value){
        $this->slugCreate = Str::slug($value);
    }

    public function updatedNameEdit($value)
    {
        $this->slugEdit  = Str::slug($value);
    }

    public function mount(Category $category){
        $this->category = $category;
        $this->getSubcategories();
    }

    public function getSubcategories(){
        $this->subcategories = Subcategory::where('category_id', $this->category->id)->get();
    }

    public function save(){
        $this->validate();
        $this->category->subcategories()->create([
            'name' => $this->nameCreate,
            'slug' => $this->slugCreate,
        ]);

        $this->reset('nameCreate', 'slugCreate');
        $this->getSubcategories();

    }

    public function edit(Subcategory $subcategory){
        $this->resetValidation();

        $this->subcategory = $subcategory;

        $this->open = true;

        $this->nameEdit = $subcategory->name;
        $this->slugEdit = $subcategory->slug;

    }

    public function update(){
        $rules = [
            'nameEdit' => 'required',
            'slugEdit' => 'required|unique:categories,slug,' . $this->category->id,
        ];

        $this->validate($rules);

        $this->subcategory->update([
            'name' => $this->nameEdit,
            'slug' => $this->slugEdit,
        ]);

        $this->reset('nameEdit', 'slugEdit', 'open');

        $this->getSubcategories();
    }

    public function delete($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        $this->getSubcategories();
    }

    public function render()
    {
        return view('livewire.admin.show-category')->layout('layouts.admin');
    }
}
