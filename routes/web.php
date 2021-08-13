<?php

use Illuminate\Support\Facades\Route;
use App\Models\login;
use App\Models\product;
use App\Http\Controllers\LogController;
use App\Http\Controllers\productController;



Route::get('/', function () {
    return redirect('home');
});

Route::post('signup',[logController::class,'insert'])->name('signup');
Route::post('login',[logController::class,'login'])->name('login');
Route::get('admin',[logController::class,'admin'])->name('admin');
Route::get('index',[logController::class,'index'])->name('index');
Route::get('logout',[logController::class,'logout']);
Route::post('insert',[logController::class,'store']);
Route::get('edit/{id}',[logController::class,'editHome']);
Route::put('update/{id}',[logController::class,'edit']);
Route::get('delete/{id}',[logController::class,'destroy']);
Route::get('home',[logController::class,'home'])->name('home');
Route::get('product',[logController::class,'product'])->name('product');
Route::POST('Addtocart',[logController::class,'addToCart'])->name('Addtocart');
Route::get('cart',[logController::class,'cart'])->name('cart');
Route::get('/cartquan/{id}/{quantity}',[logController::class,'cartQuan'])->name('cartquan');
Route::get('/cartdel/{id}',[logController::class,'cartdel'])->name('cartDel');
Route::get('checkout',[logController::class,'checkout'])->name('checkout');

