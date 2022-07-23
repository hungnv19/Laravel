<?php

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

Route::get('/', function () {
    return view('layout.master');
});
Route::get('/shop', function () {
    return view('layout.shop');
});
Route::get('/shop-detail', function () {
    return view('layout.shop-detail');
});
Route::get('/cart', function () {
    return view('layout.shopping-cart');
});
Route::get('/about', function () {
    return view('layout.about');
});
Route::get('/contact', function () {
    return view('layout.contact');
});

