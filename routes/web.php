<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
Route::get('/blog', function () {
    return view('layout.blog');
});
Route::get('/login', function () {
    return view('layout.login');
});


// Route::get('/admin', function () {
//     // trả về view resources/views/welcome.blade.php
//     return view('admin.master');
// });


Route::prefix('/dashboard')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
   
    // user
    Route::get('/user/list', [UserController::class, 'index'])->name('user_list');
    // //admin
    // Route::get('/admin/list', [UserController::class, 'adminindex'])->name('admin_list');
    // Route::get('/admin/create', [UserController::class, 'admincreate'])->name('admin_create');
    // Route::post('/admin/store', [UserController::class, 'adminstore'])->name('admin_store');
    // Route::get('/admin/edit/{id}', [UserController::class, 'adminedit'])->name('admin_edit');
    // Route::get('/admin/delete/{id}', [UserController::class, 'admindelete'])->name('admin_delete');
    // Route::post('/admin/admin_update/{id}', [UserController::class, 'adminupdate'])->name('admin_update');
    // Route::get('/user/status/{user}', [UserController::class, 'status'])->name('user_status');

    // product
    // Route::get('/product/list', [ProductController::class, 'list'])->name('product_list');
    // Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product_delete');
    // Route::post('/product/deleteall', [ProductController::class, 'deleteall'])->name('product_deleteall');
    // Route::get('/product/create', [ProductController::class, 'create'])->name('product_create');
    // Route::post('/product/store', [ProductController::class, 'store'])->name('product_store');
    // Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
    // Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product_update');

    // search
    // Route::get('/product/search', [ProductController::class, 'search'])->name('search');

    // category
    // Route::get('/danhmuc/list', [DanhmucController::class, 'list'])->name('danhmuc_list');
    // Route::get('/danhmuc/create', [DanhmucController::class, 'create'])->name('danhmuc_create');
    // Route::post('/danhmuc/store', [DanhmucController::class, 'store'])->name('danhmuc_store');
    // Route::get('/danhmuc/edit/{id}', [DanhmucController::class, 'edit'])->name('danhmuc_edit');
    // Route::post('/danhmuc/update/{id}', [DanhmucController::class, 'update'])->name('danhmuc_update');
    // Route::get('/danhmuc/delete/{id}', [DanhmucController::class, 'delete'])->name('danhmuc_delete');
    
    // size
    // Route::get('/kichthuoc/list', [KichthuocController::class, 'list'])->name('kichthuoc_list');
    // Route::get('/kichthuoc/create', [KichthuocController::class, 'create'])->name('kichthuoc_create');
    // Route::post('/kichthuoc/store', [KichthuocController::class, 'store'])->name('kichthuoc_store');
    // Route::get('/kichthuoc/edit/{id}', [KichthuocController::class, 'edit'])->name('kichthuoc_edit');
    // Route::post('/kichthuoc/update/{id}', [KichthuocController::class, 'update'])->name('kichthuoc_update');
    // Route::get('/kichthuoc/delete/{id}', [KichthuocController::class, 'delete'])->name('kichthuoc_delete');

    // đơn hàng
    // Route::get('/don-hang/list', [DonhangController::class, 'list'])->name('donhang_list');
    // Route::get('/don-hang/detai/{id}', [DonhangController::class, 'detaiorder'])->name('detai_order_user');
    // Route::get('/don-hang/status/{donhang}', [DonhangController::class, 'statusorder'])->name('status_order');

    // thống kê
    // Route::get('thongke/order', [HomeController::class, 'allorder'])->name('orderall');
    // Route::get('thongke/order/complete', [HomeController::class, 'complete'])->name('complete');
});