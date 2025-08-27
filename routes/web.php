<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductController;

// Ruta principal → lista de productos
Route::get('/', [ProductController::class, 'index'])->name('catalogo');

// Rutas manuales para productos 
Route::get('/productos/crear', [ProductController::class, 'create'])->name('productos.crear');
Route::post('/productos', [ProductController::class, 'store'])->name('productos.guardar');

// Rutas automáticas para productos
Route::resource('products', ProductController::class);

// Rutas automáticas para empresas
Route::resource('empresas', EmpresaController::class);
