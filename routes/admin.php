<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Livewire\Admin\BrandComponent;
use App\Livewire\Admin\CreateProduct;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\ShowProducts;
use App\Livewire\Admin\EditProduct;
use App\Livewire\Admin\ShowCategory;

Route::get('/', ShowProducts::class)->name('admin.index');
Route::get('products/create', CreateProduct::class)->name('admin.products.create');
Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');
Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');

Route::get('brands', BrandComponent::class)->name('admin.brands.index');

