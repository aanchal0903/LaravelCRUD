<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/',[ProductController::class, 'index'])->name('products.index');
Route::get('/products/new',[ProductController::class , 'CreateProduct'])->name('products.new');
Route::post('/products/store',[ProductController::class , 'StoreProduct'])->name('products.store');
Route::get('products/{id}/edit',[ProductController::class, 'EditProduct'])->name('products.edit');
Route::put('/products/{id}/update',[ProductController::class, 'UpdateProduct'])->name('products.update');
Route::get('/products/{id}/show',[ProductController::class, 'ShowProduct'])->name('products.show');
Route::delete('products/{id}/delete',[ProductController::class, 'DeleteProduct'])->name('products.edit');
