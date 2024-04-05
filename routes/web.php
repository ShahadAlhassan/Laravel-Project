<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Shopping;
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class,'Index'])->name('index');
Route::post('/dashboard/products', [DashboardController::class,'GetProducts'])->name('products');
Route::post('/dashboard/creatproducts', [DashboardController::class,'Creatproducts'])->name('creatproducts');
Route::get('/del/{id}', [DashboardController::class,'Del'])->name('del');
Route::get('/delpdetails/{id}', [DashboardController::class,'Delpdetails'])->name('delpdetails');

Route::get('/edit/{id}', [DashboardController::class,'EditProducts'])->name('edit');
Route::get('/editproductdetails/{id}', [DashboardController::class,'EditProductdetails'])->name('EditProductdetails');


Route::post('/dashboard/update', [DashboardController::class,'UpdateProducts'])->name('updateproduct');
Route::post('/dashboard/updatedatails', [DashboardController::class,'UpdateProductsdetails'])->name('updatedatails');
Route::post('/dashboard/search', [DashboardController::class,'Search'])->name('search');
Route::post('/dashboard/searchdetails', [DashboardController::class,'Searchdetails'])->name('searchdetails');


Route::post('/dashboard/creatproductsdetails', [DashboardController::class,'Creatproductsdetails'])->name('create_details');

Route::get('/dashboard/showall', [DashboardController::class,'Showall'])->name('showall');
Route::get('/dashboard/getproductsdetails', [DashboardController::class,'GetProductdetails'])->name('product_details');
Route::get('/logout', [DashboardController::class,'logout'])->name('logout');


Route::get('/shopping/showitems', [Shopping::class,'ShowListItemsPhone'])->name('show-items-phone');
Route::get('/shopping/details/{id}', [Shopping::class,'ShowDetailsPhone'])->name('show-items-details');
Route::get('/shopping/add_to_cart/{id}', [Shopping::class,'Add_to_cart'])->name('add_to_cart');
Route::get('/shopping/cartdetails/{id}', [Shopping::class,'cartdetails'])->name('cartdetails');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
