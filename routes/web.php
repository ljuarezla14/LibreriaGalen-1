<?php

use App\Http\Controllers\orderController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\CreateOrder;
use App\Livewire\OrderCreate;
use App\Livewire\ShowBrands;
use App\Livewire\ShowCategory;
use App\Livewire\ShowProduct;
use App\Livewire\ShowSubcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Spatie\Permission\Traits\HasRoles;

// ejemplo:
// Route::middleware(['role:admin'])->group(function () {
//     // Solo los usuarios con el rol "admin" pueden acceder a estas rutas
//     Route::get('/admin/dashboard', 'AdminController@dashboard');
//     Route::get('/admin/users', 'AdminController@users');
// });

Route::get('/productos', ShowProduct::class)->name('show.products');
Route::get('/', WelcomeController::class)->name('home');
Route::get('/categorias', ShowCategory::class)->name('show.category');
Route::get('/subcategorias', ShowSubcategory::class)->name('show.subcategory');
Route::get('/marcas', ShowBrands::class)->name('show.brands');
Route::get('/crearOrden', CreateOrder::class)->name('create.order');
Route::get('orders/{order}', [OrderCreate::class, 'show'])->name('orders.create');
Route::get('orders', [orderController::class, 'index'])->name('orders.index');
Route::get('order/{order}', [OrderController::class, 'show'])->name('orders.show');

// Registration
if (Features::enabled(Features::registration())) {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        // ->middleware(['guest:'.config('fortify.guard')])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);
        // ->middleware(['guest:'.config('fortify.guard')]);
}
