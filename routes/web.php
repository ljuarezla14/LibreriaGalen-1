<?php

use App\Http\Controllers\WelcomeController;
use App\Livewire\CreateOrder;
use App\Livewire\OrderCreate;
use App\Livewire\ShowBrands;
use App\Livewire\ShowCategory;
use App\Livewire\ShowProduct;
use App\Livewire\ShowSubcategory;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/productos', ShowProduct::class)->name('show.products');
Route::get('/categorias', ShowCategory::class)->name('show.category');
Route::get('/subcategorias', ShowSubcategory::class)->name('show.subcategory');
Route::get('/marcas', ShowBrands::class)->name('show.brands');
Route::get('/crearOrden', CreateOrder::class)->name('create.order');
Route::get('orders/{order}', [OrderCreate::class, 'show'])->name('orders.create');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
