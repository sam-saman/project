<?php

use Illuminate\Support\Facades\Route;
use App\Models\login;
use App\Models\product;
use App\Http\Controllers\LogController;
use App\Http\Controllers\productController;



Route::get('/', function () {
    return redirect('home');
});

Route::post('signup',[LogController::class,'insert'])->name('signup');
Route::post('login',[LogController::class,'login'])->name('login');
Route::get('admin',[LogController::class,'admin'])->name('admin');
Route::get('index',[LogController::class,'index'])->name('index');
Route::get('logout',[LogController::class,'logout']);
Route::post('insert',[LogController::class,'store']);
Route::get('edit/{id}',[LogController::class,'editHome']);
Route::put('update/{id}',[LogController::class,'edit']);
Route::get('delete/{id}',[LogController::class,'destroy']);
Route::get('home',[LogController::class,'home'])->name('home');
Route::get('product',[LogController::class,'product'])->name('product');
Route::POST('Addtocart',[LogController::class,'addToCart'])->name('Addtocart');
Route::get('cart',[LogController::class,'cart'])->name('cart');
Route::get('/cartquan/{id}/{quantity}',[LogController::class,'cartQuan'])->name('cartquan');
Route::get('/cartdel/{id}',[LogController::class,'cartdel'])->name('cartDel');
Route::get('checkout',[LogController::class,'checkout'])->name('checkout');
Route::get("ordernow",[LogController::class,'orderNow']); 
Route::post("orderplace",[LogController::class,'orderPlace']);
 Route::get("myorders",[LogController::class,'myOrders']);
