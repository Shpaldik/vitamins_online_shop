<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    return Product::all();
});

Route::get('/products/{id}', function ($id) {
    return Product::findOrFail($id);
});