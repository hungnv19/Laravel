<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('layout.master');
// });
// Route::get('/shop', function () {
//     return view('client.shop');
// });
// Route::get('/shop-detail', function () {
//     return view('client.shop-detail');
// });
// Route::get('/cart', function () {
//     return view('client.shopping-cart');
// });
Route::get('/about', function () {
    return view('client.about');
});
Route::get('/contact', function () {
    return view('client.contact');
});
Route::get('/blog', function () {
    return view('client.blog');
});

Route::prefix('/')->name('')->group(function () {
    Route::get('/', function () {
        return view('layout.master');
    });
    Route::get('/product-detail/{id}', [ClientController::class, 'productDetail'])->name('productDetail');
    Route::get('/product', [ClientController::class, 'product'])->name('product');
    Route::get('/categoryProducts/{id}', [ClientController::class, 'categoryProducts'])->name('categoryProducts');
    Route::get('/searchProduct', [ClientController::class, 'searchProduct'])->name('searchProduct');
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'listCart'])->name('listCart');
        Route::get('/addCart/{id}', [CartController::class, 'addCart'])->name('addCart');
        Route::get('/delete/{id}', [CartController::class, 'delete'])->name('delete');
        // Route::get('/order/{tt}', [OrderController::class, 'getOrder'])->name('order');
        // Route::get('/add-order/{tt}', [OrderController::class, 'addOrder'])->name('addOrder');
    });
});



Route::middleware('admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // user
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('list');
        Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete'); //name: users.delete
        Route::get('/status/{user}', [UserController::class, 'status'])->name('status');
    });

    //product

    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'list'])->name('list');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    });


    //category
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('list');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
});


// login
Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');
