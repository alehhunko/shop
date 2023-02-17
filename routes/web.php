<?php

use App\Http\Controllers\MainConroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainConroller::class, 'index'])->name('index');
Route::get('/shopping_cart', [MainConroller::class, 'shoppingCart'])->name('cart');
Route::get('/{category}', [MainConroller::class, 'category'])->name('category');
Route::get('/{category}/{product}', [MainConroller::class, 'productCart'])->name('product');
