<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

use App\Models\Category;

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
    return view('client.shop');
});
Route::get('/shop-detail', function () {
    return view('client.shop-detail');
});
Route::get('/cart', function () {
    return view('client.shopping-cart');
});
Route::get('/about', function () {
    return view('client.about');
});
Route::get('/contact', function () {
    return view('client.contact');
});
Route::get('/blog', function () {
    return view('client.blog');
});
Route::get('/login', function () {
    return view('client.login');
});


// Route::get('/admin', function () {
//     // trả về view resources/views/welcome.blade.php
//     return view('admin.master');
// });


Route::prefix('/dashboard')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
   
    // user
    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('list');
        Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete'); //name: users.delete
        Route::get('/status/{user}', [UserController::class, 'status'])->name('status');
    });

    //product

    Route::prefix('/product')->name('product.')->group(function(){
        Route::get('/', [ProductController::class, 'list'])->name('list');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        // Route::post('/product/deleteall', [ProductController::class, 'deleteall'])->name('product_deleteall');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    });


    //category
    Route::prefix('/category')->name('category.')->group(function(){
        Route::get('/', [CategoryController::class, 'list'])->name('list');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    
    });
   

    // //admin
    // Route::get('/admin/list', [UserController::class, 'adminindex'])->name('admin_list');
    // Route::get('/admin/create', [UserController::class, 'admincreate'])->name('admin_create');
    // Route::post('/admin/store', [UserController::class, 'adminstore'])->name('admin_store');
    // Route::get('/admin/edit/{id}', [UserController::class, 'adminedit'])->name('admin_edit');
    // Route::get('/admin/delete/{id}', [UserController::class, 'admindelete'])->name('admin_delete');
    // Route::post('/admin/admin_update/{id}', [UserController::class, 'adminupdate'])->name('admin_update');
    

    // product
    // Route::get('/product', [ProductController::class, 'list'])->name('product_list');
    // Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product_delete');
    // // Route::post('/product/deleteall', [ProductController::class, 'deleteall'])->name('product_deleteall');
    // Route::get('/product/create', [ProductController::class, 'create'])->name('product_create');
    // Route::post('/product/store', [ProductController::class, 'store'])->name('product_store');
    // Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
    // Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product_update');

    // search
    // Route::get('/product/search', [ProductController::class, 'search'])->name('search');

    // // category
    // Route::get('/category', [CategoryController::class, 'list'])->name('category_list');
    // Route::get('/category/create', [CategoryController::class, 'create'])->name('category_create');
    // Route::post('/category/store', [CategoryController::class, 'store'])->name('category_store');
    // Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
    // Route::post('/category/update/{category}', [CategoryController::class, 'update'])->name('category_update');
    // Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category_delete');
    
  

    // đơn hàng
    // Route::get('/don-hang/list', [DonhangController::class, 'list'])->name('donhang_list');
    // Route::get('/don-hang/detai/{id}', [DonhangController::class, 'detaiorder'])->name('detai_order_user');
    // Route::get('/don-hang/status/{donhang}', [DonhangController::class, 'statusorder'])->name('status_order');

    // thống kê
    // Route::get('thongke/order', [HomeController::class, 'allorder'])->name('orderall');
    // Route::get('thongke/order/complete', [HomeController::class, 'complete'])->name('complete');
});