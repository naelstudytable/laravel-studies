<?php

declare(strict_types=1);

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('example', function () {
    dd("Ok");
}); #output: ok

Route::get('save-product-example', function(){
    Product::create(['name' => 'Product 1']);
    dd("Ok");
}); #output: ok
