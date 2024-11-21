<?php

namespace App\Livewire\Admin;

use App\Models\Brands;
use Livewire\Component;

class BrandComponent extends Component
{

    public $brands, $brand;
    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null
    ];

    public $editForm=[
        'open' => false,
        'name' => null
    ];

    public $rules = [
        'createForm.name' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre'

    ];

    public function mount(){
        $this->getBrands();
    }

    public function getBrands(){
        $this->brands = Brands::all();
    }

    public function save(){
        $this->validate();

        Brands::create($this->createForm);

        $this->reset('createForm');

        $this->getBrands();
        // $this->emit('saved');
    }

    public function edit(Brands $brand){
        $this->brand = $brand;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $brand->name;
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required'
        ]);

        $this->brand->update($this->editForm);
        $this->reset('editForm');

        $this->getBrands();
    }

    public function delete(Brands $brand){
        $brand->delete();
        $this->getBrands();
    }
    public function render()
    {
        return view('livewire.admin.brand-component')->layout('layouts.admin');
    }
}
