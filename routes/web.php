<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('ingreso.inicio');
});*/





// Rutas públicas
Route::get('/', [ProductController::class, 'index'])->name('home.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


// Rutas privadas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //ruta para el product.index
    Route::resource('/product', ProductController::class)->names('product');

    Route::resource('/categories', CategoryController::class)->names('categories');
    Route::resource('/users',UserController::class)->names('users');
    //ruta para los roles de usuario
    Route::get('/users/{user}/assign_rol', [UserController::class, 'assign_rol'])->name('users.assign_rol');
    Route::put('/users/{user}/update_rol', [UserController::class, 'update_rol'])->name('users.update_rol');
    Route::resource('/roles',RoleController::class)->names('roles');

    //ruta para los permisos de usuario
    Route::resource('/permissions',PermissionController::class)->names('permissions');
});
